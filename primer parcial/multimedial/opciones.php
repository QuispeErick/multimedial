<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Fondo suave */
        }
        .header {
            text-align: center;
            padding: 50px 0;
            background-color: #007bff; /* Color azul */
            color: white;
            border-radius: 0 0 20px 20px; /* Bordes redondeados en la parte inferior */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra */
        }
        .options {
            margin: 30px auto;
            max-width: 600px; /* Ancho máximo para centralizar */
        }
        .btn-custom {
            width: 100%; /* Botones de ancho completo */
            padding: 15px;
            font-size: 1.1em;
            margin-bottom: 15px; /* Espacio entre botones */
        }
    </style>
    <title>Opciones - Catastro HAM-LP</title>
</head>
<body>
    <div class="header">
        <h1>Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?></h1>
        <h2>Opciones</h2>
    </div>
    <div class="container options">
        <a href="agregar_persona.php" class="btn btn-primary btn-custom"><i class="fas fa-user-plus"></i> Agregar Persona</a>
        <a href="agregar_propiedad.php" class="btn btn-success btn-custom"><i class="fas fa-home"></i> Agregar Propiedad</a>
        <a href="buscar_persona.php" class="btn btn-secondary btn-custom"><i class="fas fa-search"></i> Buscar Persona</a>
        <a href="consulta_persona.php" class="btn btn-info btn-custom"><i class="fas fa-list"></i> Consultar Personas</a>
        <a href="consulta_propiedad.php" class="btn btn-info btn-custom"><i class="fas fa-list"></i> Consultar Propiedades</a> <!-- Botón Consultar Propiedad -->
        <a href="logout.php" class="btn btn-danger btn-custom"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>
</body>
</html>
