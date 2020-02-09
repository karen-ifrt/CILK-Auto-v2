    <?php
    $titre = "CILK Auto | Garage auto Jons";
    require 'include/header.php';
    $currect_page = "index.php";
    ?>

    <section id="home">
        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-pause="false" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/background.jpg" alt="Vente véhicules neufs">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/fiat_utilitaire.jpg" alt="Vente véhicules d'occasions">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/fiat_campingcar.jpg" alt="Réparation camping-car">
                </div>
            </div>
        </div>
        <div class="home-content">
            <h1>Réparations toutes marques</h1>
            <p>Mécanique, carrosserie, vente V.N. & V.O.</p>
            <p>Agent FIAT et AD Expert</p>
        </div>
    </section>

    <section id="assurances">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="assurances">
                        <h2 class="reveal-1">Agréments assurances</h2>
                        <ul class="reveal-2">
                            <li><img src="images/assurances/Allianz.svg.png" alt="Allianz" class="allianz"></li>
                            <li><img src="images/assurances/carma.png" alt="Carma"></li>
                            <li><img src="images/assurances/GMF_logo.svg" alt="GMF"></li>
                            <li><img src="images/assurances/Logo_Maaf_2007.jpg" alt="Maaf"></li>
                            <li><img src="images/assurances/Macif_logo.gif" alt="Macif"></li>
                            <li><img src="images/assurances/Logo-Matmut.png" alt="Matmut"></li>
                            <li><img src="images/assurances/mma-la-primaube__pmeita.jpg" alt="MMA"></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="other-serv">
                        <h2 class="reveal-1">Nos services</h2>
                        <ul class="reveal-2">
                            <li><img src="images/assurances/carte-grise.png" alt="Service carte grise"></li>
                            <li class="allservices"><a href="services.php">Tous nos services</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row reveal-1">
                <div class="col-md-4">
                    <div class="contact-content">
                        <img src="images/contact.svg" alt="Téléphone et mail">
                        <div class="contact-text">
                            <h3>Nous contacter</h3>
                            <div class="small-divider"></div>
                            <p>Tél. : <a href="tel:+33472024442">04 72 02 44 42</a></p>
                            <p><a href="mailto:contact@cilk-autos.fr">cilkauto@outlook.fr</a></p>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="contact-content">
                        <img src="images/placeholder.svg" alt="Notre adresse">
                        <div class="contact-text">
                            <h3>Notre adresse</h3>
                            <div class="small-divider"></div>
                            <p>1 Allée des 3 Joncs</p>
                            <p>69330 JONS</p>
                            <p class="itinerary"><a href="https://www.google.com/maps/dir//Garage+Sanial+et+Sestier+Fiat+AD+Expert,+1+All%C3%A9e+des+3+Joncs,+69330+Jons/@45.7177466,5.1430727,11z/data=!4m9!4m8!1m0!1m5!1m1!1s0x47f4b7cfca1e10dd:0xf3f17b66450cd46c!2m2!1d5.0863876!2d45.8015506!3e0" target="_blank">Itinéraire</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-content">
                        <img src="images/passage-of-time.svg" alt="Nos horaires">
                        <div class="contact-text">
                            <h3>Nos horaires</h3>
                            <div class="small-divider"></div>
                            <p>Lundi au Jeudi :</p>
                            <p class="contact-hours">07h30 - 12h et 13h30 - 19h</p>
                            <p>Vendredi :</p>
                            <p class="contact-hours">07h30 - 12h et 13h30 - 18h</p>
                            <p>Samedi et Dimanche : Fermé</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="social">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="reviews">
                        <div class="review-title">
                            <h3>Les avis de nos clients</h3>
                            <div class="small-divider"></div>
                        </div>
                        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                        <div class="elfsight-app-86a632fb-201b-4827-b07d-e2083a54f23e"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="network">
                        <div class="review-title">
                            <h3>Notre actualité</h3>
                            <div class="small-divider"></div>
                        </div>
                        <div class="fb-page">
                        <p>Notre page Facebook est en cours de création...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v5.0"></script>

    <?php
    require 'include/footer.html';
    ?>