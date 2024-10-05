<?php
$host = 'localhost'; // Cambia si es necesario
$user = 'root'; // Cambia si es necesario
$password = ''; // Cambia si es necesario
$dbname = 'dbmulti';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
