<?php
session_start();
include('conexion.php');

// Verificar si el usuario es funcionario
if ($_SESSION['rol'] !== 'funcionario') {
    die("Acceso denegado.");
}

// Obtener propiedades que no tienen id_persona
$query = "SELECT id_propiedad, direccion FROM propiedad WHERE id_persona IS NULL";
$result = mysqli_query($conn, $query);

// Obtener distritos para el menú desplegable
$query_distritos = "SELECT id_distrito, nombre FROM distrito"; 
$result_distritos = mysqli_query($conn, $query_distritos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Registrar Persona</title>
</head>
<body>
    <div class="container">
        <h1>Registrar Persona</h1>
        <form action="procesar_agregar.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="paterno">Apellido Paterno:</label>
                <input type="text" id="paterno" name="paterno" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="materno">Apellido Materno:</label>
                <input type="text" id="materno" name="materno" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" class="form-control">
            </div>
            <div class="form-group">
                <label for="distrito">Selecciona el Distrito:</label>
                <select id="distrito" name="distrito_id" class="form-control" required>
                    <option value="">Seleccione un distrito</option>
                    <?php while ($row_distrito = mysqli_fetch_assoc($result_distritos)): ?>
                        <option value="<?php echo $row_distrito['id_distrito']; ?>">
                            <?php echo $row_distrito['nombre']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="zona">Selecciona la Zona:</label>
                <select id="zona" name="zona_id" class="form-control" required>
                    <option value="">Seleccione una zona</option>
                </select>
            </div>
            <div class="form-group">
                <label for="propiedad">Selecciona la Propiedad:</label>
                <select id="propiedad" name="propiedad_id" class="form-control" required>
                    <option value="">Seleccione una propiedad</option>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <option value="<?php echo $row['id_propiedad']; ?>">
                            <?php echo $row['direccion']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Registrar Persona</button>
        </form>
         
        <div class="d-flex justify-content-between">
            <a href="opciones.php" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#distrito').change(function() {
                var distritoID = $(this).val();

                if(distritoID) {
                    $.ajax({
                        type: 'POST',
                        url: 'obtener_zonas.php',
                        data: { id_distrito: distritoID },
                        success: function(html) {
                            $('#zona').html(html);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error en la solicitud AJAX: ' + textStatus, errorThrown);
                        }
                    });
                } else {
                    $('#zona').html('<option value="">Seleccione una zona</option>');
                }
            });
        });
    </script>
</body>
</html>
