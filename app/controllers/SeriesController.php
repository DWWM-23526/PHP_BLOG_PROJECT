<?php namespace Controllers;
    use Core\HttpResponse;
    use Repositories\SerieRepository;

class SeriesController extends BaseController
{

    public function index(){
        $serieRepository = new SerieRepository();
        $series = $serieRepository->getAll();
        $attributes = [
            'series' => $series,
            'pageTitle' => "MyBlog - Les séries",
        ];
        $this->render($attributes);
    }

    public function articles(){
        $id = (int)($this->params[0] ?? 0);
        HttpResponse::SendNotFound($id < 1);
        $serieRepository = new SerieRepository();
        $serie = $serieRepository->getOneById($id);
        $articles = $serieRepository->getArticles($id);
        HttpResponse::SendNotFound($serie == null);
        $attributes = [
            'serie' => $serie,
            'articles' => $articles,
            'pageTitle' => "MyBlog - Série : ". $serie->title,
        ];
        $this->render($attributes);
    }
}  
