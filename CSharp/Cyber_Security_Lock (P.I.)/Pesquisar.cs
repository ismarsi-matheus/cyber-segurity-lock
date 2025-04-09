using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Cyber_Security_Lock__P.I._
{
    public partial class Pesquisar : Form
    {
        public Pesquisar()
        {
            InitializeComponent();
        }

       
   
            private void buttonBuscar_Click(object sender, EventArgs e)
        {

        }

        private void textBoxTitulo_TextChanged(object sender, EventArgs e)
        {

        }

        

        private void button_buscar_Click(object sender, EventArgs e)
        {
            
            string filtro = button_buscar.Text; // Pode ser CPF ou nome
            string conexao = "server=localhost;database=cyber_security_lock;uid=root;pwd=;";

            using (MySqlConnection conn = new MySqlConnection(conexao))
            {
                conn.Open();

                string sql = "SELECT u.id, u.usuario, u.senha FROM tb_user u JOIN tb_pessoa p ON u.id_pessoa = p.id WHERE p.cpf = '' ";


                MySqlCommand cmd = new MySqlCommand(sql, conn);
                MySqlDataReader reader = cmd.ExecuteReader();

                if (reader.Read())
                {
                    textBox_usuario.Text = reader["usuario"].ToString();
                    textBox_nome.Text = reader["nome"].ToString();
                    textBox_email.Text = reader["email"].ToString();
                    textBox_CPF.Text = reader["cpf"].ToString();
                    textBox_senha.Text = reader["senha"].ToString();

                    // Guardar ID em tag (útil pro UPDATE)
                    textBox_usuario.Tag = reader["id"];
                }
                else
                {
                    MessageBox.Show("Cliente não encontrado.");
                }

                conn.Close();
            }
        }

            


        

        private void button_fechar_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void button_limparCampo_Click(object sender, EventArgs e)
        {

        }

        private void textBox_Pesquisar_TextChanged(object sender, EventArgs e)
        {

        }

        private void button_editar_Click(object sender, EventArgs e)
        {
            if (textBox_usuario.Tag == null)
            {
                MessageBox.Show("Busque um cliente primeiro!");
                return;
            }

            int idUsuario = Convert.ToInt32(textBox_usuario.Tag);
            string usuario = textBox_usuario.Text;
            string nome = textBox_nome.Text;
            string email = textBox_email.Text;
            string senha = textBox_senha.Text;
            string cpf = textBox_CPF.Text;

            string conexao = "server=localhost;database=cyber_security_lock;uid=root;pwd=;";

            using (MySqlConnection conn = new MySqlConnection(conexao))
            {
                conn.Open();

                // Atualiza dados do usuário
                string updateUsuario = $@"UPDATE tb_user u
            JOIN tb_pessoa p ON u.id_pessoa = p.id
            SET u.usuario = '{usuario}', u.email = '{email}', u.senha = '{senha}',
                p.nome = '{nome}', p.cpf = '{cpf}'
            WHERE u.id = {idUsuario}
        ";

                MySqlCommand cmd = new MySqlCommand(updateUsuario, conn);
                int linhasAfetadas = cmd.ExecuteNonQuery();

                if (linhasAfetadas > 0)
                {
                    MessageBox.Show("Dados atualizados com sucesso!");
                }
                else
                {
                    MessageBox.Show("Erro ao atualizar.");
                }

                conn.Close();
            }
        }
    }
    }

