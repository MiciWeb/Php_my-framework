<?php
class MovieModel extends \Core\Entity
{
    public function getAllRecords(){
        return $this->find("film",array("" => "limit 20"));
    }
}
