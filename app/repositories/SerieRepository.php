<?php namespace Repositories;
    use PDO;
    use Entities\Serie;

class SerieRepository extends BaseRepository
{
    public function getAll(){
        $queryResponse = $this->preparedQuery("SELECT * FROM serie");
        $articles = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS,"Entities\Serie");
        return $articles;
    }
    public function getOneById($id){
        $queryResponse = $this->preparedQuery("SELECT * FROM serie WHERE id_serie = ?", [$id]);
        $article = new Serie($queryResponse->statement->fetch(PDO::FETCH_ASSOC));
        return $article;
    }
}

