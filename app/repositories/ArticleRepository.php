<?php namespace Repositories;
    use PDO;
    use Entities\Article;

class ArticleRepository extends BaseRepository
{
    public function getLastPublishedArticles($qty){
        $sql = "SELECT * FROM article ORDER BY ? DESC LIMIT $qty;";
        $queryResponse = $this->preparedQuery($sql, ['published_at']);
        $articles = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS,"Entities\Article");
        return $articles;
    }
}
