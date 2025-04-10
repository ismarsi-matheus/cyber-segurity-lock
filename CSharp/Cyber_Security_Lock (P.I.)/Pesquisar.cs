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
            string filtro = textBox_Pesquisar.Text;
            string conexao = "Server=82.180.153.103;Port=3306;Database=u531683190_cyber_security;User ID=u531683190_AntonioMatheus;Password=AntonioMatheus123;";

            using (MySqlConnection conn = new MySqlConnection(conexao))
            {
                conn.Open();

                string sql = @"SELECT u.id, u.usuario, u.senha, p.nome, p.email, p.cpf 
                       FROM tb_user u 
                       JOIN tb_pessoa p ON u.id_pessoa = p.id 
                       WHERE p.cpf = @filtro OR p.nome LIKE CONCAT('%', @filtro, '%')";

                MySqlCommand cmd = new MySqlCommand(sql, conn);
                cmd.Parameters.AddWithValue("@filtro", filtro);

                MySqlDataReader reader = cmd.ExecuteReader();

                if (reader.Read())
                {
                    textBox_usuario.Text = reader["usuario"].ToString();
                    textBox_nome.Text = reader["nome"].ToString();
                    textBox_email.Text = reader["email"].ToString();
                    textBox_CPF.Text = reader["cpf"].ToString();
                    textBox_senha.Text = reader["senha"].ToString();
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

            string conexao = "Server=82.180.153.103;Port=3306;Database=u531683190_cyber_security;User ID=u531683190_AntonioMatheus;Password=AntonioMatheus123;";

            using (MySqlConnection conn = new MySqlConnection(conexao))
            {
                conn.Open();

                string updateSql = @"
            UPDATE tb_user u
            JOIN tb_pessoa p ON u.id_pessoa = p.id
            SET 
                u.usuario = @usuario,
                u.senha = @senha,
                p.nome = @nome,
                p.email = @email,
                p.cpf = @cpf
            WHERE u.id = @idUsuario
        ";

                MySqlCommand cmd = new MySqlCommand(updateSql, conn);
                cmd.Parameters.AddWithValue("@usuario", usuario);
                cmd.Parameters.AddWithValue("@senha", senha);
                cmd.Parameters.AddWithValue("@nome", nome);
                cmd.Parameters.AddWithValue("@email", email);
                cmd.Parameters.AddWithValue("@cpf", cpf);
                cmd.Parameters.AddWithValue("@idUsuario", idUsuario);

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

        
            private void button_limparCampos_Click(object sender, EventArgs e)
        {
            textBox_usuario.Clear();
            textBox_nome.Clear();
            textBox_email.Clear();
            textBox_CPF.Clear();
            textBox_senha.Clear();
            textBox_Pesquisar.Clear();
            textBox_usuario.Tag = null;
        }

    }
}


