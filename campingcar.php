    <?php
    $titre = "Camping-car Jons | CILK AUTO";
    $descr = "Entretien et réparation de votre camping-car. Vidange, distribution, pneumatiques, climatisation, etc...";
    $ogtitle = "CILK AUTO - Camping-car";
    $ogurl = "https://www.cilkauto.fr/campingcar.php";
    $ogimage = "https://www.cilkauto.fr/images/logo-CILK.png";
    require 'include/header.php';
    $currect_page = "campingcar.php";
    ?>

    <section id="campingcar">

        <div class="camping-title">
            <div class="container">
                <h3>Entretien de votre camping-car</h3>
            </div>
        </div>

        <div class="camping-img">
            <img src="images/campingcar-jons.jpg" alt="Réparation et entretien camping-car Jons">
        </div>

        <div class="camping-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Nous réalisons les prestations ci-dessous pour votre camping-car :</h4>
                        <ul>
                            <li>Vidange</li>
                            <li>Distribution</li>
                            <li>Suspensions</li>
                            <li>Pneumatiques</li>
                            <li>Climatisation</li>
                        </ul>
                    </div>
                    <div class="col-md-6 d-flex align-items-center bouton-contact">
                        <div class="btn-contact">
                            <a href="contact.php">Nous contacter</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </section>

    <?php
    require 'include/footer.html';
    ?>