<?php

require_once "Database/DbConnection.php";


$dbConnection = new DbConnection();

$pdo = $dbConnection->getPDO();
