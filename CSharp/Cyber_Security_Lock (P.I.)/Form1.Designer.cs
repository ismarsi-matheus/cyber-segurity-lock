namespace Cyber_Security_Lock__P.I._
{
    partial class Form1
    {
        /// <summary>
        /// Variável de designer necessária.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Limpar os recursos que estão sendo usados.
        /// </summary>
        /// <param name="disposing">true se for necessário descartar os recursos gerenciados; caso contrário, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Código gerado pelo Windows Form Designer

        /// <summary>
        /// Método necessário para suporte ao Designer - não modifique 
        /// o conteúdo deste método com o editor de código.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Form1));
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.textBox_usuario = new System.Windows.Forms.TextBox();
            this.textBox_senha = new System.Windows.Forms.TextBox();
            this.button_entrar = new System.Windows.Forms.Button();
            this.button_fechar = new System.Windows.Forms.Button();
            this.button_exibirSenha = new System.Windows.Forms.Button();
            this.label_mensagem = new System.Windows.Forms.Label();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            this.SuspendLayout();
            // 
            // pictureBox1
            // 
            this.pictureBox1.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.pictureBox1.BackColor = System.Drawing.Color.Transparent;
            this.pictureBox1.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox1.Image")));
            this.pictureBox1.Location = new System.Drawing.Point(448, 35);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(239, 241);
            this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox1.TabIndex = 0;
            this.pictureBox1.TabStop = false;
            // 
            // label1
            // 
            this.label1.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(376, 311);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(91, 20);
            this.label1.TabIndex = 1;
            this.label1.Text = "USUÁRIO";
            // 
            // label2
            // 
            this.label2.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.Location = new System.Drawing.Point(376, 408);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(70, 20);
            this.label2.TabIndex = 2;
            this.label2.Text = "SENHA";
            // 
            // textBox_usuario
            // 
            this.textBox_usuario.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.textBox_usuario.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.textBox_usuario.Location = new System.Drawing.Point(473, 311);
            this.textBox_usuario.Name = "textBox_usuario";
            this.textBox_usuario.Size = new System.Drawing.Size(189, 22);
            this.textBox_usuario.TabIndex = 1;
            // 
            // textBox_senha
            // 
            this.textBox_senha.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.textBox_senha.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.textBox_senha.Location = new System.Drawing.Point(473, 408);
            this.textBox_senha.Name = "textBox_senha";
            this.textBox_senha.Size = new System.Drawing.Size(189, 22);
            this.textBox_senha.TabIndex = 2;
            this.textBox_senha.UseSystemPasswordChar = true;
            this.textBox_senha.TextChanged += new System.EventHandler(this.textBox_senha_TextChanged);
            // 
            // button_entrar
            // 
            this.button_entrar.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.button_entrar.Location = new System.Drawing.Point(473, 458);
            this.button_entrar.Name = "button_entrar";
            this.button_entrar.Size = new System.Drawing.Size(75, 50);
            this.button_entrar.TabIndex = 4;
            this.button_entrar.Text = "ENTRAR";
            this.button_entrar.UseVisualStyleBackColor = true;
            this.button_entrar.Click += new System.EventHandler(this.button_entrar_Click);
            // 
            // button_fechar
            // 
            this.button_fechar.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.button_fechar.Location = new System.Drawing.Point(587, 458);
            this.button_fechar.Name = "button_fechar";
            this.button_fechar.Size = new System.Drawing.Size(75, 50);
            this.button_fechar.TabIndex = 5;
            this.button_fechar.Text = "FECHAR";
            this.button_fechar.UseVisualStyleBackColor = true;
            this.button_fechar.Click += new System.EventHandler(this.button_fechar_Click);
            // 
            // button_exibirSenha
            // 
            this.button_exibirSenha.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.button_exibirSenha.Location = new System.Drawing.Point(690, 411);
            this.button_exibirSenha.Name = "button_exibirSenha";
            this.button_exibirSenha.Size = new System.Drawing.Size(75, 19);
            this.button_exibirSenha.TabIndex = 3;
            this.button_exibirSenha.Text = "exibir senha";
            this.button_exibirSenha.UseVisualStyleBackColor = true;
            this.button_exibirSenha.Click += new System.EventHandler(this.button_exibirSenha_Click);
            // 
            // label_mensagem
            // 
            this.label_mensagem.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.label_mensagem.AutoSize = true;
            this.label_mensagem.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_mensagem.Location = new System.Drawing.Point(489, 361);
            this.label_mensagem.Name = "label_mensagem";
            this.label_mensagem.Size = new System.Drawing.Size(0, 20);
            this.label_mensagem.TabIndex = 6;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.SystemColors.ActiveCaption;
            this.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("$this.BackgroundImage")));
            this.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Zoom;
            this.ClientSize = new System.Drawing.Size(1161, 624);
            this.Controls.Add(this.label_mensagem);
            this.Controls.Add(this.button_exibirSenha);
            this.Controls.Add(this.button_fechar);
            this.Controls.Add(this.button_entrar);
            this.Controls.Add(this.textBox_senha);
            this.Controls.Add(this.textBox_usuario);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.pictureBox1);
            this.DoubleBuffered = true;
            this.Name = "Form1";
            this.Text = "Tela Inicial";
            this.WindowState = System.Windows.Forms.FormWindowState.Maximized;
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.TextBox textBox_usuario;
        private System.Windows.Forms.TextBox textBox_senha;
        private System.Windows.Forms.Button button_entrar;
        private System.Windows.Forms.Button button_fechar;
        private System.Windows.Forms.Button button_exibirSenha;
        private System.Windows.Forms.Label label_mensagem;
    }
}

