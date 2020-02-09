    <?php
    $titre = "CILK Auto | Contactez-nous";
    require 'include/header.php';
    $currect_page = "contact.php";
    ?>



    <section id="formulaire">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Nous contacter</h3>
                    <div class="small-divider"></div>
                    <form id="contact-form" method="post" action="" role="form">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Votre prénom *" id="prenom" name="prenom">
                                <p class="error"></p>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Votre nom *" id="nom" name="nom">
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                <input type="email" class="form-control form-input" placeholder="Votre e-mail *" id="mail" name="mail">
                                <p class="error"></p>
                            </div>
                            <div class="col">
                                <input type="tel" class="form-control form-input" placeholder="Votre téléphone *" id="telephone" name="telephone">
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="8" placeholder="Votre message *" id="message" name="message"></textarea>
                            <p class="error"></p>
                        </div>

                        <button type="submit" class="btn-contact">Envoyer</button>
                    </form>

                    <div class="contact-content">
                        <img src="images/contact.svg" alt="Téléphone et mail">
                        <div class="contact-text">
                            <p>Tél. : <a href="tel:+33472024442">04 72 02 44 42</a></p>
                            <p>Mail : <a href="mailto:contact@cilk-autos.fr">cilkauto@outlook.fr</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map">
                        <h3>Nous situer</h3>
                        <div class="small-divider"></div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d695.3746125549821!2d5.086255310268709!3d45.80127495390529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4b78c24c72c47%3A0x588613cfcda1430e!2sCILK%20AUTO!5e0!3m2!1sfr!2sfr!4v1581181595519!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <?php
    require 'include/footer.html';
    ?>