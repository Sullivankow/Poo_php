<?php

use App\Repository\ArticleRepository;

require_once 'vendor/autoload.php';

$articleManager = new ArticleRepository();

foreach ($articleManager->findAll() as $article) {
    echo $article->title . '<br>';
}