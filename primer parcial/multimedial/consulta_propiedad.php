<?php 
session_start();
include('conexion.php'); // Asegúrate de tener este archivo para la conexión a la base de datos

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: index.php");
    exit();
}

// Consulta para obtener todas las propiedades
$query = "SELECT * FROM propiedad";
$result = mysqli_query($conn, $query);

// Consulta para obtener el conteo de personas por tipo de impuesto
$query_personas_impuesto = "
    SELECT 
        p.nombre,
        SUM(CASE WHEN pr.tipo_impuesto = 'alto' THEN 1 ELSE 0 END) AS Alto,
        SUM(CASE WHEN pr.tipo_impuesto = 'medio' THEN 1 ELSE 0 END) AS Medio,
        SUM(CASE WHEN pr.tipo_impuesto = 'bajo' THEN 1 ELSE 0 END) AS Bajo
    FROM 
        persona p
    LEFT JOIN 
        propiedad pr ON p.id_persona = pr.id_persona
    GROUP BY 
        p.nombre
    ORDER BY 
        p.nombre
";
$result_personas_impuesto = mysqli_query($conn, $query_personas_impuesto);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Consultar Propiedades y Personas por Tipo de Impuesto</title>
</head>
<body>
    <div class="container">
        <h1>Consultar Propiedades</h1>

        <!-- Tabla de todas las propiedades -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Dirección</th>
                    <th>Código Catastral</th>
                    <th>Tipo de Impuesto</th>
                    <th>ID Persona</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id_propiedad']; ?></td>
                            <td><?php echo $row['direccion']; ?></td>
                            <td><?php echo $row['codigo_catastral']; ?></td>
                            <td><?php echo $row['tipo_impuesto']; ?></td>
                            <td><?php echo $row['id_persona'] !== null ? $row['id_persona'] : 'N/A'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No se encontraron propiedades.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Tabla de personas por tipo de impuesto -->
        <h2>Conteo de Personas por Tipo de Impuesto</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Alto</th>
                    <th>Medio</th>
                    <th>Bajo</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result_personas_impuesto) > 0): ?>
                    <?php while ($row_persona = mysqli_fetch_assoc($result_personas_impuesto)): ?>
                        <tr>
                            <td><?php echo $row_persona['nombre']; ?></td>
                            <td><?php echo $row_persona['Alto']; ?></td>
                            <td><?php echo $row_persona['Medio']; ?></td>
                            <td><?php echo $row_persona['Bajo']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No se encontraron personas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-primary">Volver</a>
    </div>
    
</body>
</html>

