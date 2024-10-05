<?php
session_start();
include('conexion.php'); // Asegúrate de tener este archivo para la conexión a la base de datos

// Verificar si el usuario es funcionario
if ($_SESSION['rol'] !== 'funcionario') {
    die("Acceso denegado.");
}

// Inicializar mensaje
$message = "";

// Función para obtener el tipo de impuesto desde el archivo Java .jar
function obtenerTipoImpuesto($codigo_catastral) {
    // Ejecutar el JAR y pasar el código catastral como argumento
    $command = "java -jar ControlPagoImpuesto.jar $codigo_catastral";
    $output = shell_exec($command);

    // Eliminar cualquier salto de línea o espacio del resultado
    return trim($output);
}

// Manejar la inserción de propiedad
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $direccion = mysqli_real_escape_string($conn, $_POST['direccion']);
    $codigo_catastral = mysqli_real_escape_string($conn, $_POST['codigo_catastral']);

    // Ejecutar el archivo Java para obtener el tipo de impuesto
    $tipo_impuesto = obtenerTipoImpuesto($codigo_catastral);
    
    // Validar y manejar el ID de la persona
    $id_persona = $_POST['id_persona'] !== '' ? intval($_POST['id_persona']) : 'NULL'; // Puede ser nulo

    // Consulta SQL
    $query = "INSERT INTO propiedad (direccion, codigo_catastral, tipo_impuesto, id_persona) 
              VALUES ('$direccion', '$codigo_catastral', '$tipo_impuesto', $id_persona)";
    
    // Ejecutar la consulta
    if (mysqli_query($conn, $query)) {
        $message = '<div class="alert alert-success" role="alert">Propiedad agregada con éxito.</div>';
    } else {
        // Muestra el error en caso de fallo
        $message = '<div class="alert alert-danger" role="alert">Error al agregar propiedad: ' . mysqli_error($conn) . '</div>';
    }
}

// Obtener la lista de personas para el select
$query_personas = "SELECT id_persona, nombre FROM persona";
$result_personas = mysqli_query($conn, $query_personas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Agregar Propiedad</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Propiedad</h1>
        <?php echo $message; ?> <!-- Mostrar el mensaje aquí -->
        <form action="agregar_propiedad.php" method="POST">
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="codigo_catastral">Código Catastral:</label>
                <input type="text" id="codigo_catastral" name="codigo_catastral" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_persona">ID Persona (opcional):</label>
                <select id="id_persona" name="id_persona" class="form-control">
                    <option value="">Seleccione una persona (opcional)</option>
                    <?php while ($row_persona = mysqli_fetch_assoc($result_personas)): ?>
                        <option value="<?php echo $row_persona['id_persona']; ?>">
                            <?php echo $row_persona['nombre']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Propiedad</button>
            <a href="opciones.php" class="btn btn-secondary">Volver</a> <!-- Botón Cancelar -->
        </form>
    </div>
</body>
</html>
