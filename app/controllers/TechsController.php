<?php namespace Controllers;
    use Core\HttpResponse;
    use Repositories\TechRepository;

class TechsController extends BaseController
{

    public function index(){
        $techRepository = new TechRepository();
        $techs = $techRepository->getAll();
        $attributes = [
            'techs' => $techs,
            'pageTitle' => "MyBlog - Les techs",
        ];
        $this->render($attributes);
    }

    public function articles(){
        $id = (int)($this->params[0] ?? 0);
        HttpResponse::SendNotFound($id < 1);
        $techRepository = new TechRepository();
        $tech = $techRepository->getOneById($id);
        $articles = $techRepository->getArticles($id);
        HttpResponse::SendNotFound($tech == null);
        $attributes = [
            'tech' => $tech,
            'articles' => $articles,
            'pageTitle' => "MyBlog - Tech : ". $tech->label,
        ];
        $this->render($attributes);
    }
}  
