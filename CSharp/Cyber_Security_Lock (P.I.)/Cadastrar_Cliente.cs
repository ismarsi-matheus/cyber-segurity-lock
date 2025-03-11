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

            if (ValidarCpf(cpf))
            {
                labelAlert.Text = "CPF Válido";
                labelAlert.ForeColor = Color.Green;
            }
            else
            {
                labelAlert.Text = "CPF INVÁLIDO";
                labelAlert.ForeColor = Color.Red;
                maskedTextBox_CPF.Text = "";
                maskedTextBox_CPF.Focus();
            }

            //Define sua string de conexão com o banco
            string conexaoString = "Server=localhost; Port=3306; Database=db_cyber_security_lock; Uid=root; Pwd=;";

            //Defina a inserção de registro no BD

            string query = "INSERT INTO tb_user (nome, email, CPF, usuario) VALUES (@nome, @email, @CPF, @usuario)";

            //Crie uma conexão com o BD

            using (MySqlConnection conexao = new MySqlConnection(conexaoString))
            {
                try
                {
                    //Abre a conexao
                    conexao.Open();

                    //Crie o comenado SQL
                    using (MySqlCommand comando = new MySqlCommand(query, conexao))
                    {
                        //Adicionar os parâmetros com os valores dos TexBox
                        comando.Parameters.AddWithValue("@nome", textBox_nome.Text);
                        comando.Parameters.AddWithValue("@email", textBox_email.Text);
                        comando.Parameters.AddWithValue("@CPF", maskedTextBox_CPF.Text);
                        comando.Parameters.AddWithValue("@usuario", textBox_usuario.Text);

                        //Executa o comando de inserção

                        comando.ExecuteNonQuery();

                        MessageBox.Show("Dados inseridos com sucesso!");
                    }
                }

                catch (Exception ex)
                {
                    //em caso de erro, exiba mensagem de erro
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

       
    }
}
