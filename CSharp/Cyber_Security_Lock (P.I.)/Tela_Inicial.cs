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
    public partial class Tela_Inicial : Form
    {
        public Tela_Inicial()
        {
            InitializeComponent();
        }       

        private void button_cadastrarCliente_Click(object sender, EventArgs e)
        {
            Cadastrar_Cliente form = new Cadastrar_Cliente();
            form.ShowDialog();
        }        
      
        private void button_gerenciamento_Click_1(object sender, EventArgs e)
        {
            Gerenciamento form = new Gerenciamento();
            form.ShowDialog();
        }

        private void button_fechar_Click_1(object sender, EventArgs e)
        {
            this.Close();

        }

        private void button_pesquisar_Click(object sender, EventArgs e)
        {
            Pesquisar form = new Pesquisar();
            form.ShowDialog();
        }
    }
}
