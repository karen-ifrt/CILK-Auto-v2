<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['username'])) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: ../auth/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CILK Auto | Page administration</title>
    <link rel="icon" href="../images/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <div class="topnav">
            <div class="container">
                <div class="topnav-info">
                </div>
            </div>
        </div>


        <nav class="navbar navbar-expand-lg" id="navigation">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="../images/logo-CILK.png" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <p>Page administration | Voir un véhicule</p>
                </div>
            </div>
        </nav>
    </header>

    <button onclick="topFunction()" id="myBtn"><img src="../images/chevron-up.svg" alt="Revenir en haut de la page"></button>

    <?php
    require 'database.php';

    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (!empty($_GET['id'])) {
        $id = checkInput($_GET['id']);
    }

    $db = Database::connect();
    $statement = $db->prepare('SELECT voitures.id, voitures.title, voitures.id_ref, voitures.id_num, voitures.price, voitures.km, voitures.color, voitures.marque, voitures.modele, voitures.annee, voitures.chevaux, voitures.wearbox, voitures.options, voitures.comments, voitures.carb, reference.name AS ref, number.value AS num, carburant.name AS carbu, boitevitesse.name AS boitevi
    FROM voitures 
    LEFT JOIN carburant ON voitures.carb = carburant.id 
    LEFT JOIN boitevitesse ON voitures.wearbox = boitevitesse.id
    INNER JOIN reference ON voitures.id_ref = reference.id
    INNER JOIN number ON voitures.id_num = number.id
    WHERE voitures.id = ?');
    $statement->execute(array($id));
    $item = $statement->fetch();
    Database::disconnect();

    // Récupération images

    $db = Database::connect();
    $stm = $db->prepare('SELECT relation.id_voiture, relation.id_images, images.name, images.id FROM relation INNER JOIN images ON relation.id_images = images.id INNER JOIN voitures ON relation.id_voiture = voitures.id WHERE voitures.id = ? ');
    $stm->execute(array($id));
    $img = $stm->fetchAll();
    Database::disconnect();




    ?>

    <section class="car-view">
        <div class="container">
            <div class="row">
                <form>
                    <h1 class="form-title"> <?php echo ' ' . $item['title']; ?> </h1>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">

                            <?php
                            $i = 0;
                            foreach ($img as $row) {
                                $actives = '';
                                if ($i == 0) {
                                    $actives = 'active';
                                }
                            ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo $actives; ?>"></li>
                            <?php $i++;
                            } ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php
                            $i = 0;
                            foreach ($img as $row) {
                                $actives = '';
                                if ($i == 0) {
                                    $actives = 'active';
                                }
                            ?>
                                <div class="carousel-item <?php echo $actives; ?>">
                                    <img class="d-block" src="<?php echo '../images/' . $row['name']; ?>">
                                </div>

                            <?php $i++;
                            } ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="first-label">Marque :</label><br><?php echo ' ' . $item['marque']; ?>
                        </div>
                        <div class="col">
                            <label>Modèle :</label><br><?php echo ' ' . $item['modele']; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Référence :</label><br><?php echo ' ' . $item['ref']; ?>-<?php echo $item['num']; ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Prix :</label><br><?php echo ' ' . number_format((float) $item['price'], 0, '.', ' ') . ' €'; ?>
                        </div>
                        <div class="col">
                            <label>Couleur :</label><br><?php echo ' ' . $item['color']; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="first-label">Kilométrage :</label><br><?php echo ' ' . number_format((float) $item['km'], 0, '.', ' ') . ' km'; ?>
                        </div>
                        <div class="col">
                            <label>Année :</label><br><?php echo ' ' . $item['annee']; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Chevaux :</label><br><?php echo ' ' . $item['chevaux']; ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Carburant :</label><br><?php echo ' ' . $item['carbu']; ?>
                        </div>
                        <div class="col">
                            <label>Boîte de vitesse :</label><br><?php echo ' ' . $item['boitevi']; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Options :</label>
                            <br>
                            <pre><?php echo ' ' . $item['options']; ?></pre>
                        </div>
                        <div class="col">
                            <label>Commentaires :</label>
                            <br>
                            <pre><?php echo ' ' . $item['comments']; ?></pre>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="index.php" class="btn btn-primary">Retour</a>
                    </div>

                </form>
            </div>
        </div>

    </section>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../script.js"></script>

</body>

</html>