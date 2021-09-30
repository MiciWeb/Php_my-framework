<?php
foreach ($infos as $value) {
    if ($value["id_film"] < 18) {
        echo "Film " . $value["id_film"] . ":&nbsp; <a href='movie/" . $value["id_film"] . "'>  " . $value["titre"] . "</a> &nbsp;";
        echo '<form action="movie/delete" method="post">
            <input type="submit" value="delete" name="' . $value["id_film"] . '">
            </form><br><br>';
    }
}
?>

<?= "Last film " . $value["id_film"] . ": <a href='movie/" . $value["id_film"] . "'>  " . $value["titre"] . "    </a><br>";
?>

<!-- <form action="" method="post">
    <label for=""></label>
    <input type="text" name="delete">
    <input type="submit" value="">
</form> -->