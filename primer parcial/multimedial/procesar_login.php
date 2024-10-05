<?php
session_start();
include('conexion.php');

// Capturar los datos del formulario
$nombre_usuario = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena'];

// Consulta para verificar las credenciales
$query = "SELECT * FROM usuario WHERE nombre_usuario = '$nombre_usuario'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($user && $contrasena = $user['contrasena']) {
    // Guardar información del usuario en la sesión
    $_SESSION['nombre_usuario'] = $user['nombre_usuario'];
    $_SESSION['rol'] = $user['rol'];

    // Redirigir a la página de opciones
    header("Location: opciones.php");
    exit();
} else {
    // Si las credenciales son incorrectas
    echo "Nombre de usuario o contraseña incorrectos.";
    echo "<a href='index.php'>Volver a intentar</a>";
}
?>
