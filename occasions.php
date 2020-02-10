    <?php
    $titre = "CILK Auto | Occasions";
    $descr = "Retrouvez ici tous nos véhicules d'occasions à la vente.";
    require 'include/header.php';
    $currect_page = "occasions.php";
    ?>

    <section id="occasions">

        <div class="occasions-title">
            <div class="container">
                <h3>Nos véhicules d'occasions</h3>
            </div>
        </div>

        <?php

        require 'caiultko/database.php';

        $db = Database::connect();
        $statement = $db->query('SELECT * FROM voitures ORDER BY id DESC');
        Database::disconnect();

 


        echo '<div class="container">
            <div class="row">';


        while ($item = $statement->fetch()) {

            echo '<div class="col-md-6">
            <div class="thumbnail">
                        <div class="car-img">
                            <img src="images/' . $item['images'] . '" alt="' . $item['title'] . '">
                        </div>
                        <div class="caption">
                            <h4>' . $item['title'] . '</h4>
                            <div class="price">' . number_format((float) $item['price'], 0, '.', ' ') . ' €' . '</div>
                        <div class="kilometers">' . number_format((float) $item['km'], 0, '.', ' ') . ' km' . '</div>
                            <div class="annee">' . $item['annee'] . '</div>
                            <a href="voiture.php?id=' . $item['id'] . '" class="btn-more">En savoir plus</a>
                        </div>
                    </div>
                </div>';
        }

        echo '</div>
        </div>
    </section>';


        ?>




        <?php
        require 'include/footer.html';
        ?>