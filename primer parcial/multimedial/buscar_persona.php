<?php
session_start();
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Buscar Persona</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Buscar Persona por Propiedad</h1>
        <form action="buscar_persona.php" method="GET">
            <div class="form-group">
                <label for="codigo_catastral">Código Catastral:</label>
                <input type="text" id="codigo_catastral" name="codigo_catastral" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
             
               
                <a href="opciones.php" class="btn btn-secondary">volver</a> <!-- Botón Cancelar -->
              
        </form>
         
      
        <?php if (isset($_GET['codigo_catastral'])): ?>
            <?php
            $codigo_catastral = $_GET['codigo_catastral'];
            $query = "SELECT p.nombre, p.paterno, p.materno 
                      FROM persona p 
                      JOIN propiedad prop ON p.id_persona = prop.id_persona 
                      WHERE prop.codigo_catastral = '$codigo_catastral'";
            $result = mysqli_query($conn, $query);
            ?>
            <h2>Resultados:</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['paterno']; ?></td>
                                <td><?php echo $row['materno']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">No se encontraron resultados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        <?php endif; ?>
         
        
    </div>

    
</body>
</body>
</html>
