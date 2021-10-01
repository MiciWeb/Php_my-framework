<?php
class MovieController extends Core\Controller
{
    public function showAction()
    {
        $model = new MovieModel();
        $infos = $model->getAllRecords();
        $url = $_SERVER['REQUEST_URI'];
        $pop = explode("/", $url);
        $last = array_pop($pop);
        if (ctype_digit($last)) {
            $genre = $model->readGenre("genre", $last);
        }
        if (ctype_digit($last)) {
            $this->render("movie", ["infos" => $infos, "last" => $last, "genre" => $genre]);
        } else {
            $this->render("movies", ["infos" => $infos]);
        }
    }
    public function deleteAction()
    {
        $params = new Core\Request;
        $request = $params->getQueryParams();
        $this->render("delete");
        if (isset($request)) {
            $model = new MovieModel;
            $model->deleteMovie("film", key($request));
        }
    }
    public function editAction()
    {
        $this->render("edit");
        $params = new Core\Request;
        $request = $params->getQueryParams();
        if (isset($request)) {
            // echo $request["title"];
            echo "<br>";
            // echo $request["edit"];
            $model = new MovieModel;
            $model->updateFilm("film", $request["edit"], ["titre" => $request["title"]]);
        }
    }
}
