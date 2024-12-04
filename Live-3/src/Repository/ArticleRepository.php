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
}