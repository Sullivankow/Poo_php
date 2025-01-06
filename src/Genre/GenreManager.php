<?php


namespace App\Genre;

use App\Database\DbConnection;
use PDO;

class GenreManager
{

    public function findAll()
    {
        return DbConnection::getInstance()->getPDO()->query('SELECT * from genre')->fetchAll(PDO::FETCH_OBJ);
    }
}
