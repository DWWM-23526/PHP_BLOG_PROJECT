<?php namespace Controllers;
    use Core\HttpResponse;
    use Repositories\ArticleRepository;

class ArticlesController extends BaseController
{

    public function details(){
        $id = (int)($this->params[0] ?? 0);
        HttpResponse::SendNotFound($id < 1);
        $articleRepository = new ArticleRepository();
        $article = $articleRepository->getOneById($id);
        HttpResponse::SendNotFound($article == null);
        $attributes = [
            'article' => $article,
            'pageTitle' => "MyBlog - Article : ".$article->title,
        ];
        $this->render($attributes);
    }
}  
