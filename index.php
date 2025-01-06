<?php

require_once "vendor/autoload.php";

use App\Database\DbConnection;


try {
    $dbConnexion = DbConnection::getInstance();
    $pdo = $dbConnexion->getPDO();
    echo "Connexion réussie à la base de données ! 🎉";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}




// $dbConnection->getPDO()->query('SELECT * from genre');
