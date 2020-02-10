<?php

function active($currect_page)
{
    $url_array =  explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if ($currect_page == $url) {
        echo 'active';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titre ?></title>
    <meta name="description" content="<?php echo $descr ?>" />
    <link rel="icon" href="images/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="fixed-top">
        <div class="topnav">
            <div class="container-fluid">
                <div class="topnav-content">

                    <div class="topnav-info">
                        <img src="images/call.svg" alt="Téléphone">
                        <a href="tel:+33472024442">
                            <p>04 72 02 44 42</p>
                        </a>
                    </div>
                    <div class="topnav-mail">
                        <img src="images/envelope.svg" alt="Email">
                        <a href="mailto:contact@cilk-autos.fr">cilkauto@outlook.fr</a>
                    </div>
                </div>

            </div>
        </div>

        <nav class="navbar navbar-expand-lg" id="navigation">

            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="images/logo-CILK.png" alt="Logo CILK AUTO"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?php active('index.php'); ?>" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php active('garage.php'); ?>" href="garage.php">Garage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php active('services.php'); ?>" href="services.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php active('campingcar.php'); ?>" href="campingcar.php">Camping-car</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.fiat.fr/" target="_blank">Véhicules neufs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php active('occasions.php'); ?>" href="occasions.php">Véhicules d'occasions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php active('contact.php'); ?>" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="logos-nav">
                    <a href="https://www.fiat.fr/" target="_blank">
                        <img class="logo-fiat" src="images/logo-fiat.png" alt="Logo FIAT">
                    </a>
                    <a href="https://www.ad.fr/" target="_blank">
                        <img class="logo-expert" src="images/logo-expert.png" alt="Logo AD EXPERT">
                    </a>
                </div>
            </div>
        </nav>

    </header>

    <button onclick="topFunction()" id="myBtn"><img src="images/chevron-up.svg" alt="Revenir en haut de la page"></button>