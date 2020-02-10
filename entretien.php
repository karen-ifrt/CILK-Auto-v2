    <?php
    $titre = "CILK AUTO | Réparation et entretien";
    $descr = "Nos services d'entretien et de réparation : Révision, Liaison au sol, Chauffage/climatisation, Visibilité, Moteur/transmission, Electrique/électronique, etc...";
    $ogtitle = "CILK AUTO - Réparation et entretien";
    $ogurl = "https://www.cilkauto.fr/entretien.php";
    $ogimage = "https://www.cilkauto.fr/images/logo-CILK.png";
    require 'include/header.php';
    $currect_page = "services.php";
    ?>

    <section id="entretien">
        <div class="occasions-title">
            <div class="container">
                <h3>Entretien et réparation</h3>
            </div>
        </div>
        <div class="container reveal-1">
            <div class="row">
                <div class="col-md-4">
                    <div class="revision rev-up">
                        <div class="repair-image">
                            <img src="images/entretien/repair.png" alt="Réparation" class="repair-img">
                        </div>
                        <h2>Révision</h2>
                        <div class="rev-content">
                            <p>Révision garantie constructeur préservée</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="revision rev-up">
                        <div class="repair-image">
                            <img src="images/entretien/liaison.png" alt="Liaison au sol" class="repair-img">
                        </div>
                        <h2>Liaison au sol</h2>
                        <div class="rev-content">
                            <p>Pneumatiques</p>
                            <p>Amortisseurs</p>
                            <p>Freinage</p>
                            <p>Réglage train roulant</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="revision rev-up">
                        <div class="repair-image">
                            <img src="images/entretien/air.png" alt="Chauffage et climatisation" class="repair-img">
                        </div>
                        <h2>Chauffage</h2>
                        <h2>Climatisation</h2>
                    </div>
                </div>
            </div>

            <div class="row row-two">
                <div class="col-md-4">
                    <div class="revision rev-down">
                        <div class="repair-image">
                            <img src="images/entretien/light.png" alt="Visibilité" class="repair-img">
                        </div>
                        <h2>Visibilité</h2>
                        <div class="rev-content">
                            <p>Vitrage</p>
                            <p>Rénovation optique</p>
                            <p>Contrôle réglage éclairage</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="revision rev-down">
                        <div class="repair-image">
                            <img src="images/entretien/transmission.png" alt="Moteur et transmission" class="repair-img">
                        </div>
                        <h2>Moteur - transmission</h2>
                        <div class="rev-content">
                            <p>Mécanique</p>
                            <p>Distribution</p>
                            <p>Embrayage</p>
                            <p>Échappement</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="revision rev-down">
                        <div class="repair-image">
                            <img src="images/entretien/battery.png" alt="Electrique et électronique" class="repair-img">
                        </div>
                        <h2>électrique - électronique</h2>
                        <div class="rev-content">
                            <p>Diagnostic électronique</p>
                            <p>Allumage gestion moteur</p>
                            <p>Électricité</p>
                        </div>
                    </div>
                </div>
            </div>

            <a href="services.php" class="btn btn-return">Retour</a>

        </div>

    </section>










    <?php
    require 'include/footer.html';
    ?>