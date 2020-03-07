    <?php
    $titre = "Services | CILK AUTO";
    $descr = "Nos services : Réparation/Entretien, Carrosserie, Contrôle technique, Carte grise, Service à domicile, Camping-car, Vente de véhicules neufs et d'occasions.";
    $ogtitle = "CILK AUTO - Services";
    $ogurl = "https://www.cilkauto.fr/services.php";
    $ogimage = "https://www.cilkauto.fr/images/logo-CILK.png";
    require 'include/header.php';
    $currect_page = "services.php";
    ?>

    <section id="services">
        <div class="occasions-title">
            <div class="container">
                <h3>Nos services</h3>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="entretien.php">
                        <div class="service">
                            <h4>Réparation / Entretien</h4>
                            <img class="repair-img" src="images/reparations-jons.svg" alt="Réparations garage Jons" width="90">
                        </div>
                    </a>
                </div>

                <div class="col-md-3" data-toggle="modal" data-target="#modalCarrosserie">
                    <div class="service">
                        <h4>Carrosserie</h4>
                        <img class="card-img" src="images/carrosserie-jons.svg" alt="Carrosserie garage Jons" width="90">
                    </div>
                </div>

                <div class="modal fade" id="modalCarrosserie">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Carrosserie</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="image-repair">
                                    <img src="images/entretien/carrosserie-jons.jpg" alt="Carrosserie jons">
                                </div>
                                <div class="content-repair">
                                    <p>Nous réalisons les prestations ci-dessous pour les véhicules toutes marques:</p>
                                    <br>
                                    <ul>
                                        <li>Remplacement de pièces</li>
                                        <li>Débosselage</li>
                                        <li>Petits chocs</li>
                                        <li>Redressage</li>
                                        <li>Tôlerie</li>
                                        <li>Ponçage</li>
                                        <li>Peinture</li>
                                        <li>Traitement rayures</li>
                                        <li>Pare-brise</li>
                                        <li>Optiques / Rénovation d'optiques </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-close" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" data-toggle="modal" data-target="#modalControle">
                    <div class="service">
                        <h4>Contrôle technique</h4>
                        <img src="images/controle-technique-jons.svg" alt="Controle technique Jons" width="80">
                    </div>
                </div>

                <div class="modal fade" id="modalControle">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="content-repair">
                                    <h4>Pré-contrôle technique</h4>
                                    <p>Le pré-contrôle technique est une sécurité pour éviter toute déconvenue lors du passage de votre véhicule en contrôle technique. Le garage CILK AUTO vous propose une révision complète de votre véhicule en vue du contrôle technique. </p>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="content-repair">
                                    <h4>Contrôle technique</h4>
                                    <p>Dans la continuité de la révision complète de votre véhicule nous vous proposons de présenter votre véhicule dans un centre agréé de Contrôle Technique.</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-close" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" data-toggle="modal" data-target="#modalCarte">
                    <div class="service">
                        <h4>Carte grise</h4>
                        <img class="card-img" src="images/carte-grise-jons.svg" alt="Carte grise Jons" width="90">
                    </div>
                </div>

                <div class="modal fade" id="modalCarte">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Carte grise</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="image-repair service-carte-grise">
                                    <img src="images/entretien/service-carte-grise.png" alt="Carte grise garage Jons">
                                </div>
                                <div class="content-repair content-carte">
                                    <p>Le garage CILK AUTO vous propose le service carte grise qui va vous faciliter la vie !</p>
                                    <p>Présentez-vous sans rendez-vous et nous gérons votre demande de carte grise en seulement 15 minutes !</p>
                                    <p>Vous recevrez votre nouvelle carte grise chez vous dans un délai de 48h.</p>
                                    <p>Tarif : 25€ TTC + coût de la carte grise.</p>
                                    <div class="pieces-carte" data-toggle="modal" data-target="#modalPieces">
                                        <a href="#" class="btn btn-secondary">Pièces à fournir</a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-close" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalPieces">
                    <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Pièces à fournir</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="content-repair content-pieces">
                                    <p>Originaux</p>
                                    <ul>
                                        <li>Carte grise entière (Barrée "vendue le ...")</li>
                                        <li>Certificat de cession complété et signé</li>
                                        <li>Demande d'immatriculation complétée et signée</li>
                                        <li>Mandat complété et signé</li>
                                        <li>Le contrôle technique doit être de moins de 6 mois pour les véhicules de plus de 4 ans</li>
                                    </ul>
                                    <p class="copies">Copies</p>
                                    <ul>
                                        <li>Copie de pièce d'identité</li>
                                        <li>Copie du permis de conduire</li>
                                        <li>Copie d'un justificatif de domicile</li>
                                        <li>Copie de l'assurance du véhicule</li>
                                    </ul>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-close" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-3" data-toggle="modal" data-target="#myModal">
                    <div class="service">
                        <h4>Service à domicile</h4>
                        <img class="repair-img" src="images/service-domicile-jons.svg" alt="Service à domicile garage Jons" width="90">
                    </div>
                </div>

                <div class="col-md-3">
                    <a href="campingcar.php">
                        <div class="service">
                            <h4>Camping-car</h4>
                            <img src="images/campingcar-jons.svg" alt="Réparations camping-car Jons" width="80">
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="https://www.fiat.fr/" target="_blank">
                        <div class="service">
                            <h4>Vente véhicules neufs</h4>
                            <img class="card-img" src="images/fiat-jons.svg" alt="Vente véhicules neufs garage Jons" width="90">
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="occasions.php">
                        <div class="service">
                            <h4>Vente véhicules d'occasions</h4>
                            <img class="card-img" src="images/occasions-jons.svg" alt="Vente véhicules d'occasions garage Jons" width="90">
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </section>

    <?php
    require 'include/footer.html';
    ?>