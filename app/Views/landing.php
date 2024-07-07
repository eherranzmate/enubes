<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; 
            padding-top: 70px; 
        }
        h1 {
            font-size: 5rem; 
        }
        h1 span,
        a span {
            color: #007bff; 
        }
        h1 span {
            font-size: 6rem; 
        }
        .navbar {
            background-color: #ffffff; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
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
        
        .container-video {
            max-width: 100%; 
            margin-top: 20px; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">e<span>N</span>ubes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Mi Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Cerrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    // Leer los datos de la landing page desde el archivo de configuración
    $file = WRITEPATH . 'landingPage.json';
    $landingData = json_decode(file_get_contents($file), true);
    ?>

    <div class="container-fluid text-center container-video">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/lFm0BSE3ph4" allowfullscreen></iframe>
        </div>
        <div class="mt-4">
            <h1>e<span>N</span>ubes</h1>
            <p class="mt-3">Fecha: <?php echo date('Y-m-d'); ?></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+alr9BMu+NMXr2j3e8b8r2YnqNyukGFO+lg3MKrPpRJyEEx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-hQJogq0lgCBpFdB6B8v+dv2MbjS+6PpSq4EJg0+PZlpaTEKcLS+3E7ZiRf6ONB2k" crossorigin="anonymous"></script>
</body>
</html>
