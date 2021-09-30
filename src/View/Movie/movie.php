<?php
foreach ($infos as $value) {
    if ($value["id_film"] == $last) {
        echo "<h2> " . $value["titre"] . "</h2>";
        echo "<h2> " . $value["resum"] . "</h2>";
        echo "<h2> " . $value["date_debut_affiche"] . "</h2>";
    }
}
