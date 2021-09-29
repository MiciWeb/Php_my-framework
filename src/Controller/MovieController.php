<?php
class MovieController extends Core\Controller{
    public function showAction(){
        $model = new MovieModel();
        $infos = $model->getAllRecords();
        $url = $_SERVER['REQUEST_URI'];
        $pop = explode("/",$url);
        $last = array_pop($pop);
        if(strlen($last) < 4){
            $this->render("movie");
        }
        $this->render("movies",["infos" => $infos]);
    }
}