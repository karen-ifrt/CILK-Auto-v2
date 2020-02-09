<form action="">
    <select id="voitures" name="voitures" class="linked-select" data-target="#nombre" data-source="list.php?type=nombre&filter=$id">
        <option value="0">Sélectionnez une marque</option>

        <?php
        require 'database.php';
        $db = Database::connect();
        $voitures = $db->query('SELECT * FROM reference');

        foreach ($voitures as $voiture) {

            echo '<option value="' . $voiture['id'] . '">' . $voiture['name'] . '</option>';
        }
        ?>


    </select>


    <select id="nombre" name="nombre" disabled>
        <option value="0">Numéro</option>
    </select>

</form>













<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="test.js"></script>