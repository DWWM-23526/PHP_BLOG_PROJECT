<?php namespace Controllers;
    use Core\HttpResponse;
    use Repositories\SerieRepository;

class SeriesController extends BaseController
{

    public function index(){
        $serieRepository = new SerieRepository();
        $series = $serieRepository->getAll();
    }

    public function articles(){
        $id = (int)($this->params[0] ?? 0);
        HttpResponse::SendNotFound($id < 1);
        $serieRepository = new SerieRepository();
        $serie = $serieRepository->getOneById($id);
        HttpResponse::SendNotFound($serie == null);
    }
}  

?>