<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Enlazar Bootstrap CSS desde el CDN (versión 4.6) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; /* Color de fondo similar al del User Dashboard */
        }
        .navbar {
            background-color: #fff; /* Fondo blanco para la barra de navegación */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra ligera */
            margin-bottom: 20px;
        }
        .navbar-brand {
            font-size: 2rem; /* Tamaño de fuente para el logo */
            color: #007bff; /* Color azul claro */
            font-weight: bold; /* Negrita */
        }
        .navbar-nav .nav-link {
            color: #6c757d; /* Gris oscuro para los enlaces */
            transition: color 0.3s ease; /* Transición de color suave */
            margin-left: 20px; /* Espaciado entre los enlaces */
        }
        .navbar-nav .nav-link:hover {
            color: #007bff; /* Color azul claro al hacer hover */
        }
        .form-section {
            margin-top: 30px; /* Espacio entre formularios */
        }
        h2 {
           color: #007bff;
           margin-top: 15px;
        }
        .welcome-section {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 40px;
        }
        .welcome-section img {
            width: 50px; /* Tamaño pequeño para la imagen */
            height: 50px;
            border-radius: 50%;
            margin-right: 15px; /* Espacio entre el texto y la imagen */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">e<span style="color: #007bff;">N</span>ubes</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Mi Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Cerrar</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <h1>Perfil</h1>
        <?php if (session()->has('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session('errors') as $error): ?>
                    <?= esc($error) ?><br>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="welcome-section">
            <img src="<?= esc($userData['avatar']); ?>" alt="Avatar">
            <h1>Bienvenido <?= esc($userData['username']); ?></h1>
        </div>

        <form action="/dashboard/editProfile" method="post" class="form-section">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= esc($userData['username']); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="avatar">Avatar URL:</label>
                <input type="text" class="form-control" id="avatar" name="avatar" value="<?= esc($userData['avatar']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

        <h1 class="form-section">Panel de administración</h1>
        <h2>Editar Usuarios</h2>
        <?php foreach ($users as $user): ?>
            <form action="/dashboard/editUser/<?= esc($user['id']); ?>" method="post" class="form-section">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['username']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <input type="text" class="form-control" id="role" name="role" value="<?= esc($user['role']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar URL:</label>
                    <input type="text" class="form-control" id="avatar" name="avatar" value="<?= esc($user['avatar']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            <hr>
        <?php endforeach; ?>

        <h2 class="form-section">Editar landing page</h2>
        <form action="/dashboard/editLandingPage" method="post" class="form-section">
            <div class="form-group">
                <label for="url">Video URL:</label>
                <input type="text" class="form-control" id="url" name="url" value="<?= esc($landingPage['url'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= esc($landingPage['title'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="date">Fecha:</label>
                <input type="date" class="form-control" id="date" name="date" value="<?= esc($landingPage['date'] ?? '') ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        <hr>
    </div>

    <!-- Enlazar Bootstrap JS desde el CDN (versión 4.6) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+alr9BMu+NMXr2j3e8b8r2YnqNyukGFO+lg3MKrPpRJyEEx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-hQJogq0lgCBpFdB6B8v+dv2MbjS+6PpSq4EJg0+PZlpaTEKcLS+3E7ZiRf6ONB2k" crossorigin="anonymous"></script>
</body>
</html>
