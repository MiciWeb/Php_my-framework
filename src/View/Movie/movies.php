<?php
foreach ($infos as $value) {
    echo "<a href='movie/" . $value["id_film"] . "'>  " . $value["titre"] . "    </a><br>";
}
