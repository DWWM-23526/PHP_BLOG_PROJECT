<?php namespace Controllers;
    use Core\HttpResponse;
    use Repositories\TechRepository;

class TechsController extends BaseController
{

    public function index(){
        $techRepository = new TechRepository();
        $techs = $techRepository->getAll();
    }

    public function articles(){
        $id = (int)($this->params[0] ?? 0);
        HttpResponse::SendNotFound($id < 1);
        $techRepository = new TechRepository();
        $tech = $techRepository->getOneById($id);
        HttpResponse::SendNotFound($tech == null);
    }
}  

?>