<?php namespace Controllers;
    use Repositories\ArticleRepository;

class HomeController extends BaseController
{
    public function index(){
        $articleRepository = new ArticleRepository();
        $articles = $articleRepository->getLastPublishedArticles(12);
        $attributes = [
            'articles' => $articles,
            'pageTitle' => "MyBlog - Accueil",
        ];
        $this->render($attributes);
    }
}  

?>

