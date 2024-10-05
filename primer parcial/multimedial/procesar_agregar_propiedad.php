<?php
session_start();
include('conexion.php');

$id_persona = $_POST['id_persona'];
$direccion = $_POST['direccion'];
$codigo_catastral = $_POST['codigo_catastral'];
$tipo_impuesto = $_POST['tipo_impuesto'];

// Consulta para insertar la nueva propiedad
$query = "INSERT INTO propiedades (id_persona, direccion, codigo_catastral, tipo_impuesto) 
          VALUES ('$id_persona', '$direccion', '$codigo_catastral', '$tipo_impuesto')";

if (mysqli_query($conn, $query)) {
    echo "Propiedad agregada exitosamente.";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>
