<?php
class GenderController extends Core\Controller
{
    public function editAction()
    {
        $params = new Core\Request;
        $request = $params->getQueryParams();
        if (isset($request)) {
            $genderId = $request["editGenre"];
            foreach($request as $key => $value){
                if(is_int($key)){
                    $filmId = $key;
                }
            }

            $this->render("edit");
            $model = new MovieModel;
            $model->updateGender("film", $filmId, ["id_genre" => $genderId]);
        }
    }
}
