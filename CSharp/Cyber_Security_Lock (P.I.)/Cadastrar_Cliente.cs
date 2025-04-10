using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Net;
using System.Net.Sockets;



namespace Cyber_Security_Lock__P.I._
{
    public partial class Cadastrar_Cliente : Form
    {
        public Cadastrar_Cliente()
        {
            InitializeComponent();

            string email = textBox_email.Text;

            if (IsValidEmail(email))
            {
                Console.WriteLine("Email válido!");
            }
            else
            {
                Console.WriteLine("Email inválido!");
            }
        }



        private void button_cadastrar_Click(object sender, EventArgs e)
        {
            string cpf = maskedTextBox_CPF.Text;

            if (!ValidarCpf(cpf))
            {
                labelAlert.Text = "CPF INVÁLIDO";
                labelAlert.ForeColor = Color.Red;
                maskedTextBox_CPF.Text = "";
                maskedTextBox_CPF.Focus();
                return;
            }

            labelAlert.Text = "CPF Válido";
            labelAlert.ForeColor = Color.Green;

            string conexaoString = "Server=82.180.153.103;Port=3306;Database=u531683190_cyber_security;User ID=u531683190_AntonioMatheus;Password=AntonioMatheus123;";
            string queryPessoa = "INSERT INTO tb_pessoa (nome, cpf, email) VALUES (@nome, @CPF, @email)";
            string queryUser = "INSERT INTO tb_user (usuario, senha, id_pessoa) VALUES (@usuario, @senha, @id_pessoa)";

            using (MySqlConnection conexao = new MySqlConnection(conexaoString))
            {
                try
                {
                    conexao.Open();

                    // Primeiro INSERT na tabela tb_pessoa
                    using (MySqlCommand comando = new MySqlCommand(queryPessoa, conexao))
                    {
                        comando.Parameters.AddWithValue("@nome", textBox_nome.Text);
                        comando.Parameters.AddWithValue("@email", textBox_email.Text);
                        comando.Parameters.AddWithValue("@CPF", maskedTextBox_CPF.Text);

                        comando.ExecuteNonQuery();

                        // Obter o ID gerado automaticamente
                        long idPessoaInserido = comando.LastInsertedId;

                        // Segundo INSERT na tabela tb_user
                        using (MySqlCommand comando2 = new MySqlCommand(queryUser, conexao))
                        {
                            comando2.Parameters.AddWithValue("@usuario", textBox_usuario.Text);
                            comando2.Parameters.AddWithValue("@senha", textBox_senha.Text);
                            comando2.Parameters.AddWithValue("@id_pessoa", idPessoaInserido);

                            comando2.ExecuteNonQuery();
                        }

                        MessageBox.Show("Cliente cadastrado com sucesso!");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Erro: " + ex.Message);
                }
            }
        }

        private void button_voltar_Click(object sender, EventArgs e)
        {
            this.Close();
        }
        private void button_limparCampo_Click(object sender, EventArgs e)
        {
            textBox_nome.Text = "";
            textBox_email.Text = "";
            maskedTextBox_CPF.Text = "";
            textBox_usuario.Text = "";
        }


        static bool IsValidEmail(string email)
        {
            // Expressão regular para validar o formato do email
            string pattern = @"^[^@\s]+@[^@\s]+\.[^@\s]+$";
            Regex regex = new Regex(pattern);
            return regex.IsMatch(email);
        }

        private bool ValidarCpf(string cpf)
        {
            // Remove qualquer caractere não numérico
            cpf = Regex.Replace(cpf, @"[^\d]", "");

            // Verifica se tem 11 dígitos
            if (cpf.Length != 11)
                return false;

            // Verifica se o CPF é uma sequência de números iguais (ex.: 111.111.111-11)
            if (new string(cpf[0], 11) == cpf)
                return false;

            // Calculando o primeiro dígito verificador
            int soma = 0;
            int peso = 10;
            for (int i = 0; i < 9; i++)
            {
                soma += int.Parse(cpf[i].ToString()) * peso--;
            }

            int resto = soma % 11;
            int digito1 = resto < 2 ? 0 : 11 - resto;
            if (digito1 != int.Parse(cpf[9].ToString()))
                return false;

            // Calculando o segundo dígito verificador
            soma = 0;
            peso = 11;
            for (int i = 0; i < 10; i++)
            {
                soma += int.Parse(cpf[i].ToString()) * peso--;
            }

            resto = soma % 11;
            int digito2 = resto < 2 ? 0 : 11 - resto;
            return digito2 == int.Parse(cpf[10].ToString());
        }

        private void label6_Click(object sender, EventArgs e)
        {

        }
    }
}
