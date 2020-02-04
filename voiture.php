<button onclick="topFunction()" id="myBtn"><img src="../images/chevron-up.svg" alt="Revenir en haut de la page"></button>

<?php
require 'admin/database.php';



if (!empty($_GET['id'])) {
    $id = checkInput($_GET['id']);
}

$db = Database::connect();
$statement = $db->prepare('SELECT voitures.id, voitures.title, voitures.id_ref, voitures.id_num, voitures.price, voitures.km, voitures.color, voitures.marque, voitures.modele, voitures.annee, voitures.chevaux, voitures.wearbox, voitures.options, voitures.comments, voitures.images, voitures.carb, reference.name AS ref, number.value AS num, carburant.name AS carbu, boitevitesse.name AS boitevi
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

$titre = "CILK Auto | " . $item['title'] . "";
require 'include/header.php';

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<section class="car-info">
    <div class="container">
        <h2><?php echo ' ' . $item['title']; ?></h2>
        <div class="row">
            <div class="col-md-6">

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="carouselExampleIndicators" class="carousel slide carousel-fullscreen" data-ride="carousel">
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
                                            <div data-toggle="modal" data-target="#exampleModal" class="carousel-full carousel-item <?php echo $actives; ?>">
                                                <img class="d-block" src="<?php echo 'images/' . $row['name']; ?>">
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
                            </div>
                        </div>
                    </div>
                </div>
                <div id="carouselExampleIndicators" class="carousel slide carousel-fullscreen" data-ride="carousel">
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
                            <div data-toggle="modal" data-target="#exampleModal" class="carousel-full carousel-item <?php echo $actives; ?>">
                                <img class="d-block" src="<?php echo 'images/' . $row['name']; ?>">
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
            </div>
            <div class="col-md-6">
                <table class="table-striped">
                    <tbody>
                        <tr>
                            <td>Prix</td>
                            <td><?php echo ' ' . number_format((float) $item['price'], 0, '.', ' ') . ' €'; ?></td>
                        </tr>
                        <tr>
                            <td>Année</td>
                            <td><?php echo ' ' . $item['annee']; ?></td>
                        </tr>
                        <tr>
                            <td>Kilométrage</td>
                            <td><?php echo ' ' . number_format((float) $item['km'], 0, '.', ' ') . ' km'; ?></td>
                        </tr>
                        <tr>
                            <td>Chevaux</td>
                            <td><?php echo ' ' . $item['chevaux']; ?></td>
                        </tr>
                        <tr>
                            <td>Carburant</td>
                            <td><?php echo ' ' . $item['carbu']; ?></td>
                        </tr>
                        <tr>
                            <td>Boîte de vitesse</td>
                            <td><?php echo ' ' . $item['boitevi']; ?></td>
                        </tr>
                        <tr>
                            <td>Couleur</td>
                            <td><?php echo ' ' . $item['color']; ?></td>
                        </tr>
                        <tr>
                            <td>Référence</td>
                            <td><?php echo ' ' . $item['ref']; ?>-<?php echo $item['num']; ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="car-item">
                    <p>Options / Equipements :</p>
                    <pre><?php echo ' ' . $item['options']; ?></pre>
                </div>
            </div>
            <div class="col-md-6">
                <div class="car-item">
                    <p>Commentaires :</p>
                    <pre><?php echo ' ' . $item['comments']; ?></pre>
                </div>
            </div>
        </div>
        <a href="occasions.php" class="btn btn-return">Retour</a>

    </div>
</section>







<?php
require 'include/footer.html';
?>