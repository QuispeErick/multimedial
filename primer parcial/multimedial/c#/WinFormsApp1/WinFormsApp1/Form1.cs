namespace WinFormsApp1
{
    using MySql.Data.MySqlClient;
    using System.Data;


    public partial class Form1 : Form
    {
        private MySqlConnection GetConnection()
        {
            string connString = "Server=localhost;Database=dbmulti;Uid=root;Pwd=;";
            return new MySqlConnection(connString);
        }
        private void MostrarPersonas()
        {
            using (MySqlConnection conn = GetConnection())
            {
                conn.Open();
                string query = "SELECT nombre, paterno, materno FROM persona";
                MySqlDataAdapter da = new MySqlDataAdapter(query, conn);
                DataTable dt = new DataTable();
                da.Fill(dt);
                tabla.DataSource = dt;
                conn.Close();
            }
        }


        public Form1()
        {
            InitializeComponent();
            MostrarPersonas();
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
           
            string nombre = textBox1.Text;
            string paterno = textBox2.Text;
            string materno = textBox3.Text;

            
            using (MySqlConnection conn = GetConnection())
            {
                conn.Open();
                string query = "INSERT INTO persona (nombre, paterno, materno) VALUES (@nombre, @paterno, @materno)";
                using (MySqlCommand cmd = new MySqlCommand(query, conn))
                {
                    cmd.Parameters.AddWithValue("@nombre", nombre);
                    cmd.Parameters.AddWithValue("@paterno", paterno);
                    cmd.Parameters.AddWithValue("@materno", materno);
                    cmd.ExecuteNonQuery();
                }
                conn.Close();
            }

            
            MostrarPersonas();
        }

        private void textBox3_TextChanged(object sender, EventArgs e)
        {

        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void textBox2_TextChanged(object sender, EventArgs e)
        {

        }

        private void tabla_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }
    }
}
