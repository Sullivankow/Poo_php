<?php

namespace App\Repository;

use App\Database\DbConnection;
use PDO;

class ArticleRepository
{
    public function findAll()
    {
        return DbConnection::getPDO()->query('select * from article')->fetchAll(PDO::FETCH_OBJ);
    }

    public function find(int $id): object
    {
        $query = DbConnection::getPDO()->prepare('select * from article where id=:id');
        $query->bindParam('id', $id);
        $query->execute();

        return $query->fetch(PDO::FETCH_OBJ);
    }
}