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
    public partial class Gerenciamento : Form
    {
        public Gerenciamento()
        {
            InitializeComponent();
        }        

        private void button_consultar_Click_1(object sender, EventArgs e)
        {
            // Definindo a string de conexão
            string connectionString = "Server=localhost;Port=3306;Database=cyber_security_lock;User ID=root;Password=;";

            try
            {
                // Cria a conexão com o banco de dados MySQL
                using (MySqlConnection conn = new MySqlConnection(connectionString))
                {
                    // Abre a conexão
                    conn.Open();

                    // Consulta SQL para selecionar todos os clientes
                    string query = "SELECT * FROM tb_user ";

                    // Cria o comando MySQL
                    using (MySqlCommand cmd = new MySqlCommand(query, conn))
                    {
                        // Executa a consulta e obtém os resultados
                        MySqlDataReader reader = cmd.ExecuteReader();

                        // Cria uma lista para armazenar os registros
                        DataTable dtproduto = new DataTable();
                        dtproduto.Load(reader);

                        // Atribui a tabela de dados ao DataGridView
                        dgv_gerenciamento.DataSource = dtproduto;
                    }
                }
            }
            catch (Exception ex)
            {
                // Exibe erro caso haja falha
                MessageBox.Show("Erro ao listar clientes: " + ex.Message);
            }
        }

        private void button_voltar_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void button_apagar_Click(object sender, EventArgs e)
        {
            if (dgv_gerenciamento.SelectedRows.Count > 0)
            {
                //Pega o ID do cliente da linha selecionada
                int produtoID = Convert.ToInt32(dgv_gerenciamento.SelectedRows[0].Cells["id"].Value);
                DialogResult result = MessageBox.Show("Tem certeza que deseja excluir este cliente?", "Confirmar Exclusão", MessageBoxButtons.YesNo);

                if (result == DialogResult.Yes)
                {
                    string connectionString = "Server=localhost; Port=3306; Database=cyber_security_lock; Uid=root; Pwd=;";

                    try
                    {
                        //Cria uma conexão com o banco de dados Mysql
                        using (MySqlConnection consulta = new MySqlConnection(connectionString))
                        {
                            //Abre a conexão 
                            consulta.Open();

                            //Consulta SQL para selecionar os clientes
                            string listagem = "DELETE FROM tb_user WHERE id = @id";


                            using (MySqlCommand cmd = new MySqlCommand(listagem, consulta))
                            {
                                cmd.Parameters.AddWithValue("id", produtoID);

                                int rowsAffected = cmd.ExecuteNonQuery();

                                if (rowsAffected > 0)
                                {
                                    MessageBox.Show("Cliente excluído com sucesso!");
                                }
                                else
                                {
                                    MessageBox.Show("Falha ao excluir o cliente.");
                                }


                            }
                        }

                    }

                    catch (Exception ex)
                    {
                        MessageBox.Show("Erro: " + ex.Message);
                    }
                }
                else
                {
                    MessageBox.Show("Por favor, selecione uma cliente poara excluir");
                }




            }
        }

        private void dgv_gerenciamento_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }
    }
}
