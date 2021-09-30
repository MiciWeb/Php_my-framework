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
            $this->render("movie", ["infos" => $infos, "last" => $last]);
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
}
