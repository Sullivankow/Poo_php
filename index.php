<?php



$dbConnection = App\Database\DbConnection::getInstance();



$dbConnection->getPDO()->query('SELECT * from genre');
