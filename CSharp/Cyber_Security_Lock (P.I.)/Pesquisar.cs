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

            string connectionString = "Server=localhost; Port=3306; Database=db_cyber_security_lock; Uid=root; Pwd=;";

            string query = "SELECT nome, email, CPF, usuario, senha FROM tb_user WHERE usuario LIKE @usuario";

            string query_id_user = "SELECT dominio, senha tb_user WHERE id_user LIKE @id_user";

            using (MySqlConnection connection = new MySqlConnection(connectionString)) // Use MySqlConnection

            {
                using (MySqlCommand command = new MySqlCommand(query, connection)) // Use MySqlCommand
                {
                    command.Parameters.AddWithValue("@usuario", "%" + textBox_usuario.Text + "%");

                    try
                    {
                        connection.Open();
                        MySqlDataReader reader = command.ExecuteReader(); // Use MySqlDataReader

                        if (reader.Read())
                        {
                            textBox_nome.Text = reader["nome"].ToString();
                            textBox_email.Text = reader["email"].ToString();
                            textBox_CPF.Text = reader["CPF"].ToString();
                            textBox_usuario.Text = reader["usuario"].ToString();
                            textBox_senha.Text = reader["senha"].ToString();




                        }
                        else
                        {
                            MessageBox.Show("Usuário não encontrado.");
                        }
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("Erro: " + ex.Message);
                    }
                }
            }


        }

        private void button_fechar_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void button_limparCampo_Click(object sender, EventArgs e)
        {

        }
    }
}
