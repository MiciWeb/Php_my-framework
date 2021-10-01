<?php
class MovieModel extends \Core\Entity
{
    public function getAllRecords(){
        return $this->find("film",array("" => ""));
    }
    public function deleteMovie($table, $request){
        return $this->deleteFilm($table, $request);
    }
}