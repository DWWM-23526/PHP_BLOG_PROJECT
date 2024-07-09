<?php namespace Controllers;
    use Repositories\TechRepository;

class TechsController extends BaseController
{

    public function index(){
        // echo "<br/>Executing ".get_called_class()." -> ".__FUNCTION__."()";
        $techRepository = new TechRepository();
        $techs = $techRepository->getAll();
        // var_dump($techs);
    }

    public function articles(){
        $id = (int)$this->params[0];
        if($id < 1) {
            header('HTTP/1.0 404 Not Found');
            die();
        }
        // echo "<br/>Executing ".get_called_class()." -> ".__FUNCTION__."() with id=".$id;
        $techRepository = new TechRepository();
        $techs = $techRepository->getOneById($id);
        // var_dump($techs);
    }
}  

?>