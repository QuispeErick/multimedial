<?php
session_start();
include('conexion.php');

if(isset($_POST['id_distrito'])){
    $id_distrito = intval($_POST['id_distrito']);
    // Consulta para obtener zonas según el distrito seleccionado
    $query = "SELECT id_zona, nombre FROM zona WHERE distrito_id = $id_distrito"; // Cambia esto según tu estructura de base de datos
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        echo '<option value="">Seleccione una zona</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id_zona'] . '">' . $row['nombre'] . '</option>';
        }
    } else {
        echo '<option value="">No hay zonas disponibles</option>';
    }
}
?>
