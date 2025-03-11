namespace Cyber_Security_Lock__P.I._
{
    partial class Tela_Inicial
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.label1 = new System.Windows.Forms.Label();
            this.button_cadastrarCliente = new System.Windows.Forms.Button();
            this.button_gerenciamento = new System.Windows.Forms.Button();
            this.button_fechar = new System.Windows.Forms.Button();
            this.button_pesquisar = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // label1
            // 
            this.label1.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("MingLiU_HKSCS-ExtB", 36F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.ForeColor = System.Drawing.Color.Black;
            this.label1.Location = new System.Drawing.Point(285, 23);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(495, 48);
            this.label1.TabIndex = 0;
            this.label1.Text = "Cyber Security Lock";
            // 
            // button_cadastrarCliente
            // 
            this.button_cadastrarCliente.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.button_cadastrarCliente.Location = new System.Drawing.Point(172, 222);
            this.button_cadastrarCliente.Name = "button_cadastrarCliente";
            this.button_cadastrarCliente.Size = new System.Drawing.Size(83, 54);
            this.button_cadastrarCliente.TabIndex = 1;
            this.button_cadastrarCliente.Text = "CADASTRAR CLIENTE";
            this.button_cadastrarCliente.UseVisualStyleBackColor = true;
            this.button_cadastrarCliente.Click += new System.EventHandler(this.button_cadastrarCliente_Click);
            // 
            // button_gerenciamento
            // 
            this.button_gerenciamento.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.button_gerenciamento.Location = new System.Drawing.Point(381, 222);
            this.button_gerenciamento.Name = "button_gerenciamento";
            this.button_gerenciamento.Size = new System.Drawing.Size(83, 54);
            this.button_gerenciamento.TabIndex = 2;
            this.button_gerenciamento.Text = "LISTA GERAL";
            this.button_gerenciamento.UseVisualStyleBackColor = true;
            this.button_gerenciamento.Click += new System.EventHandler(this.button_gerenciamento_Click_1);
            // 
            // button_fechar
            // 
            this.button_fechar.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.button_fechar.Location = new System.Drawing.Point(891, 222);
            this.button_fechar.Name = "button_fechar";
            this.button_fechar.Size = new System.Drawing.Size(75, 54);
            this.button_fechar.TabIndex = 3;
            this.button_fechar.Text = "FECHAR";
            this.button_fechar.UseVisualStyleBackColor = true;
            this.button_fechar.Click += new System.EventHandler(this.button_fechar_Click_1);
            // 
            // button_pesquisar
            // 
            this.button_pesquisar.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.button_pesquisar.Location = new System.Drawing.Point(643, 222);
            this.button_pesquisar.Name = "button_pesquisar";
            this.button_pesquisar.Size = new System.Drawing.Size(82, 54);
            this.button_pesquisar.TabIndex = 4;
            this.button_pesquisar.Text = "PESQUISAR";
            this.button_pesquisar.UseVisualStyleBackColor = true;
            this.button_pesquisar.Click += new System.EventHandler(this.button_pesquisar_Click);
            // 
            // Tela_Inicial
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.SystemColors.ActiveCaption;
            this.ClientSize = new System.Drawing.Size(1174, 618);
            this.Controls.Add(this.button_pesquisar);
            this.Controls.Add(this.button_fechar);
            this.Controls.Add(this.button_gerenciamento);
            this.Controls.Add(this.button_cadastrarCliente);
            this.Controls.Add(this.label1);
            this.Name = "Tela_Inicial";
            this.Text = "Tela_Inicial";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Button button_cadastrarCliente;
        private System.Windows.Forms.Button button_gerenciamento;
        private System.Windows.Forms.Button button_fechar;
        private System.Windows.Forms.Button button_pesquisar;
    }
}