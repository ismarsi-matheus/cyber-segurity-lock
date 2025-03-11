using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace Cyber_Security_Lock__P.I._
{
    public partial class Form1 : Form
    {
        bool VerSenhaTxt = false;
        private string usuarioCorreto = "admin";
        private string senhaCorreta = "CSL2025";

        public Form1()
        {
            InitializeComponent();
        }

        private void button_fechar_Click(object sender, EventArgs e)
        {
            this.Close(); 
        }

        private void button_entrar_Click(object sender, EventArgs e)
        {
            string usuario = textBox_usuario.Text;
            string senha = textBox_senha.Text;

            if (usuario == usuarioCorreto && senha == senhaCorreta)
            {
                label_mensagem.Text = "Bem-vindo, administrador!";
                label_mensagem.ForeColor = Color.Green;
                Tela_Inicial form = new Tela_Inicial();
                form.ShowDialog();
            }
            else
            {
                label_mensagem.Text = "Usuário ou senha ínvalida";
                label_mensagem.ForeColor = Color.Red;
                textBox_usuario.Text = "";
                textBox_senha.Text = "";
                textBox_usuario.Focus();
            }

        }

        private void button_exibirSenha_Click(object sender, EventArgs e)
        {
            if (VerSenhaTxt == false)
            {
                textBox_senha.UseSystemPasswordChar = false;  //Define a senha para visível
                VerSenhaTxt = true;
                button_exibirSenha.Text = "Ocultar Senha";
            }
            else
            {
                textBox_senha.UseSystemPasswordChar = true; //Isso define que a senha seja oculta
                VerSenhaTxt = false;
                button_exibirSenha.Text = "Mostrar Senha";
            }
        }
    }
}
