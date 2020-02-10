    <?php
    $titre = "CILK AUTO | Notre garage";
    $descr = "Nous assurons l'entretien et la réparation de véhicules toutes marques, de la citadine au camping-car. Nous pouvons aussi les préparer au contrôle technique, et réaliser des travaux de peinture et carrosserie.";
    $ogtitle = "CILK AUTO - Notre garage";
    $ogurl = "https://www.cilkauto.fr/garage.php";
    $ogimage = "https://www.cilkauto.fr/images/logo-CILK.png";
    require 'include/header.php';
    $currect_page = "garage.php";
    ?>

    <section id="garage">
        <div class="garage-title">
            <div class="container">
                <h3>Notre garage à Jons</h3>
            </div>
        </div>

        <div class="container">
            <div class="garage-block">
                <div class="row">
                    <div class="col-md-6 reveal-1">
                        <div class="garage-img">
                            <img src="images/garage_01.jpg" alt="Garage automobiles à Jons">
                        </div>
                    </div>
                    <div class="col-md-6 reveal-2">
                        <div class="garage-content">
                            <p>Repris début 2020, le garage CILK AUTO situé à Jons, près de Lyon, met à votre disposition <a href="services.php">ses services</a> et son savoir-faire.</p>
                            <p>Membre du réseau AD Expert, nous assurons l'entretien et la réparation de véhicules toutes marques, de la citadine au <a href="campingcar.php">camping-car</a>.<br>
                                Nous pouvons aussi les préparer au contrôle technique, et réaliser des travaux de peinture et carrosserie.</p>
                            <p>Vous avez un projet d'achat de véhicule ? Notre équipe saura vous conseiller parmi nos offres de <a href="https://www.fiat.fr/" target="_blank">véhicules neufs</a> (gamme FIAT) et <a href="occasions.php">d'occasions</a> (multimarques). <br> Cette prestation inclut les demandes de cartes grises afin de vous faciliter la vie !</p>
                            <p>Que vous soyez particuliers ou professionnels, nous restons à votre écoute et nous mettrons tout en oeuvre pour vous assurer le meilleur service au juste prix.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <?php
    require 'include/footer.html';
    ?>