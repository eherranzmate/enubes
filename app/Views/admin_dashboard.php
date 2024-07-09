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
            background-color: #f8f9fa; 
        }
        .navbar {
            background-color: #fff; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
            margin-bottom: 20px;
        }
        .navbar-brand {
            font-size: 2rem; 
            color: #007bff; 
            font-weight: bold; 
        }
        .navbar-nav .nav-link {
            color: #6c757d; 
            transition: color 0.3s ease; 
            margin-left: 20px; 
        }
        .navbar-nav .nav-link:hover {
            color: #007bff; 
        }
        .form-section {
            margin-top: 30px; 
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
            width: 50px; 
            height: 50px;
            border-radius: 50%;
            margin-right: 15px; 
        }
        .error-message {
            color: red;
            font-size: 0.9em;
            display: none;
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

        <form action="/dashboard/editProfile" method="post" class="form-section" id="editProfileForm">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= esc($userData['username']); ?>" required>
                <span class="error-message" id="username-error"></span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
                <span class="error-message" id="password-error"></span>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar URL:</label>
                <input type="text" class="form-control" id="avatar" name="avatar" value="<?= esc($userData['avatar']); ?>" required>
                <span class="error-message" id="avatar-error"></span>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

        <h1 class="form-section">Panel de administración</h1>
        <h2>Editar Usuarios</h2>
        <?php foreach ($users as $user): ?>
            <form action="/dashboard/editUser/<?= esc($user['id']); ?>" method="post" class="form-section editUserForm">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control username" name="username" value="<?= esc($user['username']); ?>" required>
                    <span class="error-message"></span>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control password" name="password">
                    <span class="error-message"></span>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <input type="text" class="form-control role" name="role" value="<?= esc($user['role']); ?>" required>
                    <span class="error-message"></span>
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar URL:</label>
                    <input type="text" class="form-control avatar" name="avatar" value="<?= esc($user['avatar']); ?>" required>
                    <span class="error-message"></span>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            <hr>
        <?php endforeach; ?>

        <h2 class="form-section">Editar landing page</h2>
        <form action="/dashboard/editLandingPage" method="post" class="form-section" id="editLandingPageForm">
            <div class="form-group">
                <label for="url">Video URL:</label>
                <input type="text" class="form-control" id="url" name="url" value="<?= esc($landingPage['url'] ?? '') ?>" required>
                <span class="error-message" id="url-error"></span>
            </div>
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= esc($landingPage['title'] ?? '') ?>" required>
                <span class="error-message" id="title-error"></span>
            </div>
            <div class="form-group">
                <label for="date">Fecha:</label>
                <input type="date" class="form-control" id="date" name="date" value="<?= esc($landingPage['date'] ?? '') ?>" required>
                <span class="error-message" id="date-error"></span>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        <hr>
    </div>

    <!-- Enlazar Bootstrap JS desde el CDN (versión 4.6) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+alr9BMu+NMXr2j3e8b8r2YnqNyukGFO+lg3MKrPpRJyEEx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-hQJogq0lgCBpFdB6B8v+dv2MbjS+6PpSq4EJg0+PZlpaTEKcLS+3E7ZiRf6ONB2k" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Función para validar una URL
            function isValidURL(string) {
                let res = string.match(/(https?:\/\/[^\s]+)/g);
                return (res !== null);
            }

            // Mostrar mensaje de error
            function showError(element, message) {
                let errorElement = element.nextElementSibling;
                errorElement.textContent = message;
                errorElement.style.display = 'block';
            }

            // Ocultar todos los mensajes de error
            function clearErrors() {
                document.querySelectorAll('.error-message').forEach(function(error) {
                    error.textContent = ''; 
                    error.style.display = 'none';
                });
            }

            // Validar formulario de edición de perfil
            document.getElementById("editProfileForm").addEventListener("submit", function(event) {
                clearErrors();
                let isValid = true;
                let username = document.getElementById("username").value;
                let password = document.getElementById("password").value;
                let avatar = document.getElementById("avatar").value;

                if (username.trim() === "" || username.length < 3 || username.length > 20) {
                    showError(document.getElementById("username"), "El nombre de usuario debe tener entre 3 y 20 caracteres.");
                    isValid = false;
                }

                if (password !== "" && password.length < 8) {
                    showError(document.getElementById("password"), "La contraseña debe tener al menos 8 caracteres.");
                    isValid = false;
                }

                if (!isValidURL(avatar)) {
                    showError(document.getElementById("avatar"), "La URL del avatar no es válida.");
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault(); 
                }
            });

            // Validar formulario de edición de la landing page
            document.getElementById("editLandingPageForm").addEventListener("submit", function(event) {
                clearErrors();
                let isValid = true;
                let url = document.getElementById("url").value;
                let title = document.getElementById("title").value;
                let date = document.getElementById("date").value;
                let currentDate = new Date().toISOString().split('T')[0];

                if (url.trim() === "" || title.trim() === "" || date.trim() === "") {
                    if (url.trim() === "") showError(document.getElementById("url"), "La URL del video no puede estar vacía.");
                    if (title.trim() === "") showError(document.getElementById("title"), "El título no puede estar vacío.");
                    if (date.trim() === "") showError(document.getElementById("date"), "La fecha no puede estar vacía.");
                    isValid = false;
                }

                if (!isValidURL(url)) {
                    showError(document.getElementById("url"), "La URL del video no es válida.");
                    isValid = false;
                }

                if (date < currentDate) {
                    showError(document.getElementById("date"), "La fecha no puede ser una fecha pasada.");
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault(); 
                }
            });

            // Validar formulario de edición de usuarios
            document.querySelectorAll(".editUserForm").forEach(function(form) {
                form.addEventListener("submit", function(event) {
                    clearErrors();
                    let isValid = true;

                    let username = form.querySelector(".username").value.trim();
                    let password = form.querySelector(".password").value.trim();
                    let role = form.querySelector(".role").value.trim();
                    let avatar = form.querySelector(".avatar").value.trim();

                    if (username === "" || username.length < 3 || username.length > 20) {
                        showError(form.querySelector(".username"), "El nombre de usuario debe tener entre 3 y 20 caracteres.");
                        isValid = false;
                    }

                    if (password !== "" && password.length < 8) {
                        showError(form.querySelector(".password"), "La contraseña debe tener al menos 8 caracteres.");
                        isValid = false;
                    }

                    if (role === "" || (role !== 'admin' && role !== 'user')) {
                        showError(form.querySelector(".role"), "El rol debe ser 'admin' o 'user'.");
                        isValid = false;
                    }

                    if (!isValidURL(avatar)) {
                        showError(form.querySelector(".avatar"), "La URL del avatar no es válida.");
                        isValid = false;
                    }

                    if (!isValid) {
                        event.preventDefault(); 
                    }
                });
            });

        });
    </script>
</body>
</html>
