<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Enlazar Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; 
            margin: 30px;
        }
        .container {
            background-color: #ffffff; 
            border: 1px solid #ced4da; 
            border-radius: 5px; 
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            margin-top: 50px; 
            max-width: 500px; 
            margin: auto; 
        }
    </style>
    <script>
        function validateForm() {
            let username = document.forms["loginForm"]["username"].value;
            let password = document.forms["loginForm"]["password"].value;
            if (username.trim() === "" || password.trim() === "") {
                alert("Nombre de usuario y contraseña son obligatorios");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
        <?php endif;?>
        <form name="loginForm" action="/loginAuth" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
        </form> 
    </div>

    <!-- Enlazar Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-hQJogq0lgCBpFdB6B8v+dv2MbjS+6PpSq4EJg0+PZlpaTEKcLS+3E7ZiRf6ONB2k" crossorigin="anonymous"></script>
</body>
</html>
