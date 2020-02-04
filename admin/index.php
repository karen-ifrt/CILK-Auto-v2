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
                    <p>Page administration | Véhicules d'occasions</p>
                </div>
            </div>
        </nav>
    </header>

    <button onclick="topFunction()" id="myBtn"><img src="../images/chevron-up.svg" alt="Revenir en haut de la page"></button>


    <section id="admin">
        <div class="title-cont">
            <div class="container">
                <h3>Liste des véhicules</h3>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <a href="insert.php" class="btn btn-success"><img src="../images/iconfinder_plus-24_103172.svg" width="15px" class="add-icon"> Ajouter un véhicule</a>
                <a class="btn btn-info btn-occas" href="../occasions.php" target="_blank">Voir page véhicules</a>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Véhicule</th>
                            <th>Prix</th>
                            <th>Kilomètres</th>
                            <th>Année</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT voitures.id, voitures.title, voitures.price, voitures.km, voitures.annee
                                    FROM voitures ORDER BY voitures.id DESC');
                        while ($item = $statement->fetch()) {
                            echo '<tr>';
                            echo '<td width=350>' . $item['title'] . '</td>';
                            // echo '<td>' . $item['ref'] . '</td>';
                            echo '<td>' . number_format((float) $item['price'], 0, '.', ' ') . ' €' . '</td>';
                            echo '<td>' . number_format((float) $item['km'], 0, '.', ' ') . ' km' . '</td>';
                            echo '<td>' . $item['annee'] . '</td>';
                            echo '<td width=300>';
                            echo '<a class="btn btn-info" href="view.php?id=' . $item['id'] . '">Voir</a>';
                            echo ' ';
                            echo '<a class="btn btn-primary" href="update.php?id=' . $item['id'] . '">Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id=' . $item['id'] . '">Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }

                        Database::disconnect();

                        ?>

                    </tbody>
                </table>

                <a class="btn btn-secondary" href="../auth/logout.php">Déconnexion</a>

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