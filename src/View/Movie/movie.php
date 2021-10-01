<?php
foreach ($infos as $value) {
    if ($value["id_film"] == $last) {
        echo "<h2> " . $value["titre"] . "</h2>";
        echo "<h2> " . $value["resum"] . "</h2>";
        echo "<h2> " . $value["date_debut_affiche"] . "</h2>";
?>
        <h2> Gender: <?= $genre[0]["nom"] ?> </h2>
        <form method="POST" action="edit-gender">
            <select name="editGenre">
                <option value="">Edit gender</option>
                <option value="0">Detective</option>
                <option value="1">Dramatic</option>
                <option value="2">Sf</option>
                <option value="3">Drama</option>
            </select>
            <input type="submit" name="<?= $value["id_film"] ?>" value="Ok">
        </form>
<?php
    }
}
?>


<form action="" method="post">
    <button type="submit" value="delete" name="deleteGenre"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
</form>