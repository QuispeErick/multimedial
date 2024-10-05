namespace WinFormsApp1
{
    partial class Form1
    {
        /// <summary>
        ///  Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        ///  Clean up any resources being used.
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
        ///  Required method for Designer support - do not modify
        ///  the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            btnguardar = new Button();
            label1 = new Label();
            label2 = new Label();
            label3 = new Label();
            textBox1 = new TextBox();
            textBox2 = new TextBox();
            textBox3 = new TextBox();
            tabla = new DataGridView();
            mySqlCommand1 = new MySql.Data.MySqlClient.MySqlCommand();
            ((System.ComponentModel.ISupportInitialize)tabla).BeginInit();
            SuspendLayout();
            // 
            // btnguardar
            // 
            btnguardar.Location = new Point(163, 284);
            btnguardar.Name = "btnguardar";
            btnguardar.Size = new Size(75, 23);
            btnguardar.TabIndex = 0;
            btnguardar.Text = "guardar";
            btnguardar.UseVisualStyleBackColor = true;
            btnguardar.Click += button1_Click;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Location = new Point(12, 67);
            label1.Name = "label1";
            label1.Size = new Size(49, 15);
            label1.TabIndex = 1;
            label1.Text = "nombre";
            label1.Click += label1_Click;
            // 
            // label2
            // 
            label2.AutoSize = true;
            label2.Cursor = Cursors.IBeam;
            label2.Location = new Point(13, 129);
            label2.Name = "label2";
            label2.Size = new Size(48, 15);
            label2.TabIndex = 2;
            label2.Text = "paterno";
            // 
            // label3
            // 
            label3.AutoSize = true;
            label3.Location = new Point(12, 185);
            label3.Name = "label3";
            label3.Size = new Size(52, 15);
            label3.TabIndex = 3;
            label3.Text = "materno";
            // 
            // textBox1
            // 
            textBox1.Location = new Point(115, 67);
            textBox1.Name = "textBox1";
            textBox1.Size = new Size(199, 23);
            textBox1.TabIndex = 4;
            textBox1.TextChanged += textBox1_TextChanged;
            // 
            // textBox2
            // 
            textBox2.Location = new Point(115, 129);
            textBox2.Name = "textBox2";
            textBox2.Size = new Size(199, 23);
            textBox2.TabIndex = 5;
            textBox2.TextChanged += textBox2_TextChanged;
            // 
            // textBox3
            // 
            textBox3.Location = new Point(115, 185);
            textBox3.Name = "textBox3";
            textBox3.Size = new Size(199, 23);
            textBox3.TabIndex = 6;
            textBox3.TextChanged += textBox3_TextChanged;
            // 
            // tabla
            // 
            tabla.ColumnHeadersHeightSizeMode = DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            tabla.Location = new Point(435, 51);
            tabla.Name = "tabla";
            tabla.Size = new Size(318, 326);
            tabla.TabIndex = 7;
            tabla.CellContentClick += tabla_CellContentClick;
            // 
            // mySqlCommand1
            // 
            mySqlCommand1.CacheAge = 0;
            mySqlCommand1.Connection = null;
            mySqlCommand1.EnableCaching = false;
            mySqlCommand1.Transaction = null;
            // 
            // Form1
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(800, 450);
            Controls.Add(tabla);
            Controls.Add(textBox3);
            Controls.Add(textBox2);
            Controls.Add(textBox1);
            Controls.Add(label3);
            Controls.Add(label2);
            Controls.Add(label1);
            Controls.Add(btnguardar);
            Name = "Form1";
            Text = "Form1";
            Load += Form1_Load;
            ((System.ComponentModel.ISupportInitialize)tabla).EndInit();
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private Button btnguardar;
        private Label label1;
        private Label label2;
        private Label label3;
        private TextBox textBox1;
        private TextBox textBox2;
        private TextBox textBox3;
        private DataGridView tabla;
        private MySql.Data.MySqlClient.MySqlCommand mySqlCommand1;
    }
}
