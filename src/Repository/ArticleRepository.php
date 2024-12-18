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

    public function create(string $title, string $content): bool
    {
        $query = DbConnection::getPDO()->prepare('insert into article(title, content) values(:title, :content)');
        $query->bindParam('title', $title);
        $query->bindParam('content', $content);

        return $query->execute();
    }

    public function update(object $article): bool
    {
        $query = DbConnection::getPDO()->prepare('update article set title=:title, content=:content where id = :id');
        $query->bindParam('title', $article->title);
        $query->bindParam('content', $article->content);
        $query->bindParam('id', $article->id);

        return $query->execute();
    }
}