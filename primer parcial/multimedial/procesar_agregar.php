<?php
session_start();
include('conexion.php');

// Verificar si el usuario es funcionario
if ($_SESSION['rol'] !== 'funcionario') {
    die("Acceso denegado.");
}

// Captura los datos del formulario
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$propiedad_id = $_POST['propiedad_id'];
$zona_id = $_POST['zona_id']; // Agregar zona_id

// Inserta la nueva persona en la base de datos
$query = "INSERT INTO persona (nombre, paterno, materno, correo, telefono, zona_id) VALUES ('$nombre', '$paterno', '$materno', '$correo', '$telefono', '$zona_id')"; // Asegúrate de que la tabla persona tenga zona_id
mysqli_query($conn, $query);

// Obtén el ID de la persona recién insertada
$id_persona = mysqli_insert_id($conn);

// Asocia la propiedad a la persona
$query = "UPDATE propiedad SET id_persona = $id_persona WHERE id_propiedad = $propiedad_id";
mysqli_query($conn, $query);

// Redirige a la página de consulta
header("Location: consulta_persona.php");
exit(); 
?>
