<?php
session_start();
include('conexion.php'); // Asegúrate de tener este archivo para la conexión a la base de datos

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: index.php");
    exit();
}

// Consulta para obtener todas las personas y sus propiedades
$query = "SELECT p.id_persona, p.nombre, p.paterno, p.materno, prop.direccion 
          FROM persona p 
          LEFT JOIN propiedad prop ON p.id_persona = prop.id_persona";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Consulta de Personas y Propiedades</title>
    <style>
        body {
            background-color: #f8f9fa; /* Fondo suave */
        }
        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #007bff; /* Color azul */
            color: white;
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra */
        }
        .table {
            margin-top: 20px; /* Espacio arriba de la tabla */
        }
        .btn {
            margin-top: 20px; /* Espacio arriba de los botones */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="header">
            <h1>Consulta de Personas y Propiedades</h1>
            <p>Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?></p>
        </div>
        
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Dirección de Propiedad</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id_persona']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['paterno']; ?></td>
                            <td><?php echo $row['materno']; ?></td>
                            <td><?php echo $row['direccion'] ? $row['direccion'] : 'Sin propiedad'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No se encontraron personas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <div class="d-flex justify-content-between">
     <a href="opciones.php" class="btn btn-secondary">volver</a> <!-- Botón Cancelar -->
    </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
