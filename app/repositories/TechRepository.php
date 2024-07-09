<?php namespace Repositories;
    use PDO;
    use Entities\Tech;

class TechRepository extends BaseRepository
{
    public function getAll(){
        $queryResponse = $this->preparedQuery("SELECT * FROM tech");
        $articles = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS,"Entities\Tech");
        return $articles;
    }
    public function getOneById($id){
        $queryResponse = $this->preparedQuery("SELECT * FROM tech WHERE id_tech = ?", [$id]);
        $article = new Tech($queryResponse->statement->fetch(PDO::FETCH_ASSOC));
        return $article;
    }
}

