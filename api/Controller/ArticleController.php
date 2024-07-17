<?php namespace Controller;
    use Core\HttpResponse;
    use Entity\Article;
    use Repository\ArticleRepository;
class ArticleController extends BaseController
{
    public function get() : array | Article | null
    {
        $articleRepository = new ArticleRepository();
        if($this->id <= 0){
            $articles = $articleRepository->getAll();
            return $articles;
        }
        $article = $articleRepository->getOneById($this->id);
        return $article;
    }
    public function post() : array
    {
        return ["result" => "Create an Article"];
    }
    public function put() : array
    {
        HttpResponse::SendNotFound($this->id <= 0);
        return ["result" => "Update Article with id = " . $this->id];
    }
    public function delete() : array
    {
        HttpResponse::SendNotFound($this->id <= 0);
        return ["result" => "Delete Article with id = " . $this->id];
    }
}