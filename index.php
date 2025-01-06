<?php

require_once "vendor/autoload.php";

use App\Genre\GenreManager;

$genreManager = new GenreManager();
$genres = $genreManager->findAll();


foreach ($genres as $genre) {

    echo $genre->name . '<br>';
}



// $dbConnection->getPDO()->query('SELECT * from genre');
