<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; 
            
        }
        .navbar {
            background-color: #ffffff; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
            width: 100%;
            top: 0;
        }
        a span {
            color: #007bff; 
        }
        .navbar-brand {
            font-size: 2rem; 
            color: #007bff; 
            font-weight: bold; 
        }
        label {
            color: #6c757d; 
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da; 
            border-radius: 4px; 
            box-sizing: border-box; 
        }
        input[type="submit"] {
            background-color: #007bff; 
            color: #fff; 
            padding: 10px 20px;
            border: none;
            border-radius: 4px; 
            cursor: pointer;
            transition: background-color 0.3s ease; 
        }
        input[type="submit"]:hover {
            background-color: #0056b3; 
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/landing">e<span>N</span>ubes</a>
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

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="welcome-section">
                    <img src="<?= esc($userData['avatar']); ?>" alt="Avatar">
                    <h1>Bienvenido <?= esc($userData['username']); ?></h1>
                </div>

                <!-- Formulario para editar perfil -->
                <form action="/dashboard/editProfile" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?= esc($userData['username']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar URL:</label>
                        <input type="text" id="avatar" name="avatar" class="form-control" value="<?= esc($userData['avatar']); ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Editar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+alr9BMu+NMXr2j3e8b8r2YnqNyukGFO+lg3MKrPpRJyEEx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-hQJogq0lgCBpFdB6B8v+dv2MbjS+6PpSq4EJg0+PZlpaTEKcLS+3E7ZiRf6ONB2k" crossorigin="anonymous"></script>
</body>
</html>
