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
                       <p>Page administration | Supprimer un véhicule</p>
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

        if (!empty($_POST)) {
            $id = checkInput($_POST['id']);
            $db = Database::connect();
            $statement = $db->prepare("DELETE FROM voitures WHERE id = ?");
            $statement->execute(array($id));
            $stm = $db->prepare("DELETE FROM relation WHERE id_voiture = ?");
            $stm->execute(array($id));
            Database::disconnect();
            header("Location: index.php");
        }

        function checkInput($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>


       <section class="car-delete">
           <div class="container">

               <form class="form" role="form" action="delete.php" method="post">
                   <input type="hidden" name="id" value="<?php echo $id; ?>" />
                   <p class="alert alert-warning">Êtes-vous sûr de vouloir supprimer ce véhicule ?</p>
                   <div class="form-actions-add">
                       <button type="submit" class="btn btn-success">Oui</button>
                       <a href="index.php" class="btn btn-secondary">Non</a>
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