<?php
foreach ($infos as $value) {
    if ($value["id_film"] < 18) {
        echo "Film " . $value["id_film"] . ":&nbsp; <a href='movie/" . $value["id_film"] . "'>  " . $value["titre"] . "</a> &nbsp;";
        echo '<form action="movie/edit" method="post">
            <input style="width:64px" type="text" name="title" placeholder="edit movie">
            <button type="submit" value="' . $value["id_film"] . '" name="edit"> <i class="fa fa-edit"></i> </button>
            </form>';
            
        echo '<form action="movie/delete" method="post">
            <button type="submit" value="delete" name="' . $value["id_film"] . '"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
            </form>';
        
          echo  '<br><br>';
    }
}
?>
<i class="icon-edit-sign"></i> 
<?= "Last film " . $value["id_film"] . ": <a href='movie/" . $value["id_film"] . "'>  " . $value["titre"] . "    </a><br>";
?>

<!-- <form action="movie/delete" method="post">
    <button type="submit" value="delete" name=""> <i class="fa fa-trash"></i> </button>
</form> -->