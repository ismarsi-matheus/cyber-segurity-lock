namespace Cyber_Security_Lock__P.I._
{
    partial class Gerenciamento
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
            this.dgv_gerenciamento = new System.Windows.Forms.DataGridView();
            this.button_consultar = new System.Windows.Forms.Button();
            this.button_apagar = new System.Windows.Forms.Button();
            this.button_voltar = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.dgv_gerenciamento)).BeginInit();
            this.SuspendLayout();
            // 
            // label1
            // 
            this.label1.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("MingLiU_HKSCS-ExtB", 36F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.ForeColor = System.Drawing.Color.Black;
            this.label1.Location = new System.Drawing.Point(325, 18);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(495, 48);
            this.label1.TabIndex = 1;
            this.label1.Text = "Cyber Security Lock";
            // 
            // dgv_gerenciamento
            // 
            this.dgv_gerenciamento.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.dgv_gerenciamento.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgv_gerenciamento.Location = new System.Drawing.Point(189, 99);
            this.dgv_gerenciamento.Name = "dgv_gerenciamento";
            this.dgv_gerenciamento.Size = new System.Drawing.Size(755, 310);
            this.dgv_gerenciamento.TabIndex = 2;
            this.dgv_gerenciamento.CellContentClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgv_gerenciamento_CellContentClick);
            // 
            // button_consultar
            // 
            this.button_consultar.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.button_consultar.Location = new System.Drawing.Point(343, 454);
            this.button_consultar.Name = "button_consultar";
            this.button_consultar.Size = new System.Drawing.Size(88, 42);
            this.button_consultar.TabIndex = 3;
            this.button_consultar.Text = "CONSULTAR";
            this.button_consultar.UseVisualStyleBackColor = true;
            this.button_consultar.Click += new System.EventHandler(this.button_consultar_Click_1);
            // 
            // button_apagar
            // 
            this.button_apagar.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.button_apagar.Location = new System.Drawing.Point(525, 454);
            this.button_apagar.Name = "button_apagar";
            this.button_apagar.Size = new System.Drawing.Size(88, 42);
            this.button_apagar.TabIndex = 4;
            this.button_apagar.Text = "APAGAR";
            this.button_apagar.UseVisualStyleBackColor = true;
            this.button_apagar.Click += new System.EventHandler(this.button_apagar_Click);
            // 
            // button_voltar
            // 
            this.button_voltar.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.button_voltar.Location = new System.Drawing.Point(721, 454);
            this.button_voltar.Name = "button_voltar";
            this.button_voltar.Size = new System.Drawing.Size(88, 42);
            this.button_voltar.TabIndex = 5;
            this.button_voltar.Text = "VOLTAR";
            this.button_voltar.UseVisualStyleBackColor = true;
            this.button_voltar.Click += new System.EventHandler(this.button_voltar_Click);
            // 
            // Gerenciamento
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.SystemColors.ActiveCaption;
            this.ClientSize = new System.Drawing.Size(1162, 608);
            this.Controls.Add(this.button_voltar);
            this.Controls.Add(this.button_apagar);
            this.Controls.Add(this.button_consultar);
            this.Controls.Add(this.dgv_gerenciamento);
            this.Controls.Add(this.label1);
            this.Name = "Gerenciamento";
            this.Text = "Gerenciamento";
            ((System.ComponentModel.ISupportInitialize)(this.dgv_gerenciamento)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.DataGridView dgv_gerenciamento;
        private System.Windows.Forms.Button button_consultar;
        private System.Windows.Forms.Button button_apagar;
        private System.Windows.Forms.Button button_voltar;
    }
}