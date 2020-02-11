<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['username'])) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: ../oktluiac/login.php');
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
                <a class="navbar-brand" href="index.php"><img src="../images/logo-CILK.png" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <p>Page administration | Modifier un véhicule</p>
                </div>
            </div>
        </nav>
    </header>

    <button onclick="topFunction()" id="myBtn"><img src="../images/chevron-up.svg" alt="Revenir en haut de la page"></button>


    <?php
    require 'database.php';

    if (!empty($_GET['id'])) {
        $id = checkInput($_GET['id']);
    }

    $titleError = $marqueError = $modeleError = $id_refError = $priceError = $kmError = $colorError = $anneeError = $chevauxError = $carbError = $wearboxError = $imagesError = $title = $marque = $modele = $id_ref = $id_num = $price = $km = $color = $annee = $chevaux = $carb = $wearbox = $options = $comments = $myImage = "";

    if (!empty($_POST)) {
        $title = checkInput($_POST['title']);
        $marque = checkInput($_POST['marque']);
        $modele = checkInput($_POST['modele']);
        $id_ref = checkInput($_POST['ref']);
        $id_num = checkInput($_POST['number']);
        $price = checkInput($_POST['price']);
        $km = checkInput($_POST['km']);
        $color = checkInput($_POST['color']);
        $annee = checkInput($_POST['annee']);
        $chevaux = checkInput($_POST['chevaux']);
        $carb = checkInput($_POST['carb']);
        $wearbox = checkInput($_POST['wearbox']);
        $options = checkInput($_POST['options']);
        $comments = checkInput($_POST['comments']);
        $myImage = $_FILES['images']['name'][0];
        // $images = checkInput($_FILES['images']['name']);
        // $imagesPath = '../images/' . basename($myImage);
        // $imagesExtension = pathinfo($imagesPath, PATHINFO_EXTENSION);
        $isSuccess = true;

        if (empty($title)) {
            $titleError = "Ce champ est obligatoire";
            $isSuccess = false;
        }
        if (empty($marque)) {
            $marqueError = "Ce champ est obligatoire";
            $isSuccess = false;
        }
        if (empty($modele)) {
            $modeleError = "Ce champ est obligatoire";
            $isSuccess = false;
        }
        if (empty($id_ref)) {
            $refError = "Ce champ est obligatoire";
            $isSuccess = false;
        }
        if (empty($price)) {
            $priceError = "Ce champ est obligatoire";
            $isSuccess = false;
        }
        if (empty($color)) {
            $colorError = "Ce champ est obligatoire";
            $isSuccess = false;
        }
        if (empty($km)) {
            $kmError = "Ce champ est obligatoire";
            $isSuccess = false;
        }
        if (empty($annee)) {
            $anneeError = "Ce champ est obligatoire";
            $isSuccess = false;
        }
        if (empty($chevaux)) {
            $chevauxError = "Ce champ est obligatoire";
            $isSuccess = false;
        }
        if (empty($carb)) {
            $carbError = "Ce champ est obligatoire";
            $isSuccess = false;
        }
        if (empty($wearbox)) {
            $wearboxError = "Ce champ est obligatoire";
            $isSuccess = false;
        }
        if (empty($myImage)) {
            $isImageUpdated = false;
        } else {
            $isImageUpdated = true;

            $isUploadSuccess = true;
            // if ($imagesExtension != "jpg" && $imagesExtension != "png" && $imagesExtension != "jpeg" && $imagesExtension != "gif") {
            //     $imagesError = "Les fichiers autorisés sont: .jpg, .png, .gif";
            //     $isUploadSuccess = false;
            // }
            // if (file_exists($imagesPath)) {
            //     $imagesError = "Le fichier existe déjà";
            //     $isUploadSuccess = false;
            // }
            // if ($_FILES["images"]["size"] > 500000) {
            //     $imagesError = "Le fichier ne doit pas dépasser les 500KB";
            //     $isUploadSuccess = false;
            // }
            // if ($isUploadSuccess) {
            //     if (!move_uploaded_file($_FILES["images"]["tmp_name"], $imagesPath)) {
            //         $imagesError = "Il y a eu une erreur lors de l'upload";
            //         $isUploadSuccess = false;
            //     }
            // }
        }

        if (($isSuccess && $isImageUpdated && $isUploadSuccess) || ($isSuccess && !$isImageUpdated)) {
            $db = Database::connect();
            if ($isImageUpdated) {
                $statement = $db->prepare("UPDATE voitures set title = ?, marque = ?, modele = ?, id_ref = ?, id_num = ?, price = ?, km = ?, color = ?, annee = ?, chevaux = ?, carb = ?, wearbox = ?, options = ?, comments = ?, images = ? WHERE id = ?");
                $statement->execute(array($title, $marque, $modele, $id_ref, $id_num, $price, $km, $color, $annee, $chevaux, $carb, $wearbox, $options, $comments, $myImage, $id));

                $imgCount = count($_FILES['images']['name']);

                for ($i = 0; $i < $imgCount; $i++) {
                    $lesImages = $_FILES['images']['name'];
                    $imagesPath = '../images/' . basename($lesImages[$i]);

                    // Insertion nouvelles images
                    $stm = $db->prepare('INSERT INTO images (name) VALUES (?)');
                    $stm->execute(array($lesImages[$i]));

                    move_uploaded_file($_FILES["images"]["tmp_name"][$i], $imagesPath);
                }

                //Récupération des ID des dernières images
                $stm = $db->prepare('SELECT id FROM images ORDER BY id DESC LIMIT ' . count($_FILES['images']['name']));
                $stm->execute();
                $img = $stm->fetchAll();

                // Suppression des anciennes images
                $stm = $db->prepare("DELETE FROM relation WHERE id_voiture = ?");
                $stm->execute(array($id));

                // Ajout des nouvelles images
                foreach ($img as $value) {
                    $value_id = $value['id'];
                    $statement = $db->prepare('INSERT INTO relation (id_voiture, id_images) VALUES (?, ?)');
                    $statement->execute(array($id, $value_id));
                }
            } else {
                $statement = $db->prepare("UPDATE voitures set title = ?, marque = ?, modele = ?, id_ref = ?, id_num = ?, price = ?, km = ?, color = ?, annee = ?, chevaux = ?, carb = ?, wearbox = ?, options = ?, comments = ? WHERE id = ?");
                $statement->execute(array($title, $marque, $modele, $id_ref, $id_num, $price, $km, $color, $annee, $chevaux, $carb, $wearbox, $options, $comments, $id));
            }
            Database::disconnect();
        }
    } else {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM voitures WHERE id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $title = $item['title'];
        $marque = $item['marque'];
        $modele = $item['modele'];
        $id_ref = $item['id_ref'];
        $id_num = $item['id_num'];
        $price = $item['price'];
        $km = $item['km'];
        $color = $item['color'];
        $annee = $item['annee'];
        $chevaux = $item['chevaux'];
        $carb = $item['carb'];
        $wearbox = $item['wearbox'];
        $options = $item['options'];
        $comments = $item['comments'];
        $myImage = $item['images'];


        Database::disconnect();
    }



    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>


    <section class="car-update">
        <div class="container">
            <form class="form" role="form" id="form" action="<?php echo 'update.php?id=' . $id; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="" id="hidden-checker" value="<?php echo $isSuccess ?>">
                <div class="form-group">
                    <label for="title">Titre de l'annonce :</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
                    <span class="help-inline"><?php echo $titleError; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="marque">Marque :</label>
                        <input type="text" class="form-control" id="marque" name="marque" value="<?php echo $marque; ?>">
                        <span class="help-inline"><?php echo $marqueError; ?></span>
                    </div>
                    <div class="col">
                        <label for="modele">Modèle :</label>
                        <input type="text" class="form-control" id="modele" name="modele" value="<?php echo $modele; ?>">
                        <span class="help-inline"><?php echo $modeleError; ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="ref">Référence (marque) :</label>
                        <select readonly class="form-control" id="ref" name="ref">
                            <?php
                            $db = Database::connect();
                            foreach ($db->query('SELECT * FROM reference ORDER BY name ASC') as $row) {
                                if ($row['id'] == $id_ref)
                                    echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                else
                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                            Database::disconnect();
                            ?>
                        </select>
                        <span class=" help-inline"><?php echo $id_refError; ?></span>
                    </div>
                    <div class="col">
                        <label for="number">Référence (numéro) :</label>
                        <select readonly name="number" id="number" class="form-control">
                            <?php


                            $db = Database::connect();
                            $stm = $db->prepare("SELECT voitures.id_num, voitures.id_ref, MAX(number.value), number.id FROM voitures INNER JOIN reference ON voitures.id_ref = reference.id INNER JOIN number ON voitures.id_num = number.id WHERE reference.id = ?");
                            $stm->execute(array($id_ref));
                            Database::disconnect();

                            foreach ($stm as $row) {
                                var_dump($row);
                                echo '<option selected="selected" value="' . $row['id_num'] . '">' . $row['MAX(number.value)'] . '</option>';
                            }



                            // // Incrémente de 1 les numéros en fonction de la marque
                            // foreach ($stm as $key) {
                            //     $num_actual = $key["MAX(number.value)"];
                            //     $keyplus = $num_actual + 1;
                            // };

                            // echo '<option value="' . $num_id . '">' . $num_actual . '</option>';
                            // // Vérif numéro existant
                            // $db = Database::connect();
                            // $stmt = $db->prepare("SELECT * FROM number WHERE value = ?");
                            // $stmt->execute(array($keyplus));
                            // $numero = $stmt->fetch();
                            // Database::disconnect();


                            // if ($numero) {
                            //     // "Numéro déjà dans la base";
                            // } else {
                            //     $statement = $db->prepare("INSERT INTO number (value) VALUES (?)");
                            //     $statement->execute(array($keyplus));
                            // }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="price">Prix :</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $price; ?>">
                        <span class="help-inline"><?php echo $priceError; ?></span>
                    </div>
                    <div class="col">
                        <label for="km">Kilométrage :</label>
                        <input type="number" class="form-control" id="km" name="km" value="<?php echo $km; ?>">
                        <span class="help-inline"><?php echo $kmError; ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="color">Couleur :</label>
                        <input type="text" class="form-control" id="color" name="color" value="<?php echo $color; ?>">
                        <span class="help-inline"><?php echo $colorError; ?></span>
                    </div>
                    <div class="col">
                        <label for="annee">Année :</label>
                        <input type="number" class="form-control" id="annee" name="annee" value="<?php echo $annee; ?>">
                        <span class="help-inline"><?php echo $anneeError; ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="chevaux">Chevaux :</label>
                    <input type="number" class="form-control" id="chevaux" name="chevaux" value="<?php echo $chevaux; ?>">
                    <span class="help-inline"><?php echo $chevauxError; ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="carb">Carburant :</label>
                        <select class="form-control" id="carb" name="carb">
                            <?php
                            $db = Database::connect();
                            foreach ($db->query('SELECT * FROM carburant') as $row) {
                                if ($row['id'] == $carb)
                                    echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                else
                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                            Database::disconnect();
                            ?>

                        </select>
                        <span class="help-inline"><?php echo $id_refError; ?></span>
                    </div>
                    <div class="col">
                        <label for="wearbox">Boîte de vitesse :</label>
                        <select class="form-control" id="wearbox" name="wearbox">
                            <?php
                            $db = Database::connect();
                            foreach ($db->query('SELECT * FROM boitevitesse') as $row) {
                                if ($row['id'] == $wearbox)
                                    echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                else
                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                            Database::disconnect();
                            ?>
                        </select>
                        <span class="help-inline"><?php echo $wearboxError; ?></span>
                    </div>
                </div>


                <div class="form-group">
                    <label for="options">Options / Equipements :</label>
                    <textarea type="text" class="form-control" id="options" name="options" rows="4"><?php echo $options; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="comments">Commentaires :</label>
                    <textarea type="text" class="form-control" id="comments" name="comments" rows="2"><?php echo $comments; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="images">Sélectionner des nouvelles images :</label>
                    <input type="file" id="images" name="images[]" multiple>
                    <br>
                    <span class="help-inline"><?php echo $imagesError; ?></span>
                </div>


                <div class="form-actions-add">
                    <button type="submit" href="insert.php" class="btn btn-success">Valider</button>
                    <a href="index.php" class="btn btn-primary">Retour</a>
                </div>
            </form>

        </div>

    </section>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../script.js"></script>

</body>

</html>