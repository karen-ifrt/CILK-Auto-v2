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
                    <form>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Votre prénom">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Votre nom">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="text" class="form-control form-input" placeholder="Votre e-mail">
                                </div>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control form-input" placeholder="Votre téléphone">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" placeholder="Votre message"></textarea>
                        </div>

                        <button type="submit" class="btn-contact">Envoyer</button>
                    </form>

                    <div class="contact-content">
                        <img src="images/contact.svg" alt="Contact">
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
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.484690017239!2d5.084198915442297!3d45.801550579106355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4b7cfca1e10dd%3A0xf3f17b66450cd46c!2sGarage%20Sanial%20et%20Sestier%20Fiat%20AD%20Expert!5e0!3m2!1sfr!2sfr!4v1573244857079!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <?php
    require 'include/footer.html';
    ?>