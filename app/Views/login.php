<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <script>
        function validateForm() {
            let username = document.forms["loginForm"]["username"].value;
            let password = document.forms["loginForm"]["password"].value;
            if (username == "" || password == ""){
                alert("Nombre y usuarios obligatorios");
                return false;
            }
        }
        </script>
    </head>
    <body>
    <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif;?>
    <form name="loginForm" action="/loginAuth" method="post" onsubmit="return validateForm()">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form> 
    </body>
</html>