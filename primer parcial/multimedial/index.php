<?php
session_start(); // Iniciar la sesión
include('conexion.php');

// Verificar si ya hay un usuario autenticado
if (isset($_SESSION['nombre_usuario'])) {
    header("Location: opciones.php"); // Redirigir a una página de opciones si ya está autenticado
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAM-LP - Trámites y Servicios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">HAM-LP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tramites">Trámites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección de información general -->
    <section class="py-5 bg-light text-center">
        <div class="container">
            <h1 class="display-5">Alcaldía Municipal de La Paz (HAM-LP)</h1>
            <p class="lead">La HAM-LP es el órgano ejecutivo del Gobierno Autónomo Municipal de La Paz, encargado de gestionar los servicios públicos, proyectos de desarrollo y trámites administrativos de la ciudad.</p>
            <hr class="my-4">
            <p class="lead">Nuestra misión es garantizar un crecimiento sostenible, brindando servicios eficientes y promoviendo el bienestar de los ciudadanos paceños.</p>
        </div>
        <div class="container">
        <h1>Iniciar Sesión</h1>
        <form action="procesar_login.php" method="POST">
            <div class="form-group">
                <label for="nombre_usuario">Nombre de Usuario:</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Iniciar Sesión</button>
        </form>
    </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 HAM-LP. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
