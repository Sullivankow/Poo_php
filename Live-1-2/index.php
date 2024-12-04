<?php

require_once 'Mage.php';
require_once 'Chevalier.php';


$merlin = new Mage('Merlin',100, 5, 80);
$arthur = new Chevalier('Arthur',100,  80,  10, 100);

// but prochain live
// faire que merlin puisse attaquer un autre personnage
// si attacl merlin > defense autre perso
// autre perso perd la diff entre attack merlin et sa défense (cas ci dessus arthur - 10 de vie donc vie = 90)
// sinon c'est merlin qui perd la diff entre défense autre et attaque merlin

// pensé multiplcateur attacke défense de 1.2 par level (ex: $this->level * 1.2)

/*$merlin->attack($arthur);*/

echo $merlin->getHealth()."\r\n";
echo $arthur->getHealth()."\r\n";

echo 'Merlin attaque Arthur'."\r\n";
$merlin->attack($arthur);

echo $merlin->getHealth()."\r\n";
echo $arthur->getHealth()."\r\n";

echo "\r\n";
echo "\r\n";

echo $merlin->getLevel()."\r\n";
echo $arthur->getLevel()."\r\n";

echo "\r\n";
echo "\r\n";

echo $merlin->getWinCombat()."\r\n";
echo $arthur->getWinCombat()."\r\n";

/*echo $personnage->getHealth()."\r\n";*/
