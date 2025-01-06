<?php

class DbConnection
{

    private ?PDO $pdo = null;





    public function __construct()
    {


        $this->pdo = new PDO('mysql:host=localhost;dbname=studi_moviz_poo;port=3307', 'root', '');
    }


    public function getInstance()
    {


        return $this->pdo;
    }
}
