<?php

function createPersonnage(string $name, int $level, int $health, int $attack, int $defense) {
    $name = ucfirst($name);

    if ($level > 100) {
        $level = 100;
    }
    if ($health > 100) {
        $health = 100;
    }

    return [
        'name' => $name,
        'level' => $level,
        'health' => $health,
        'attack' => $attack,
        'defense' => $defense,
    ];
}

function reduceHealth(array $pesronnage, int $health) {
    $pesronnage['health'] -= $health;

    return $pesronnage;
}

$personnage = createPersonnage('Merlin', 10, 100, 2, 80);

/*echo $personnage['name']."\r\n";
echo $personnage['health']."\r\n";*/

$personnage = reduceHealth($personnage, 20);

/*echo $personnage['health'];*/

////// OBJECT

require_once 'Personnage.php';

$merlin = new Personnage('Merlin',100, 20, 80);
$arthur = new Personnage('Arthur',100,  80,  10, 100);

// but prochain live
// faire que merlin puisse attaquer un autre personnage
// si attacl merlin > defense autre perso
// autre perso perd la diff entre attack merlin et sa défense (cas ci dessus arthur - 10 de vie donc vie = 90)
// sinon c'est merlin qui perd la diff entre défense autre et attaque merlin

// pensé multiplcateur attacke défense de 1.2 par level

/*$merlin->attack($arthur);*/

echo $merlin->getHealth()."\r\n";
echo $arthur->getHealth()."\r\n";


/*echo $personnage->getHealth()."\r\n";*/
