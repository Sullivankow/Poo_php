<?php
//Fonction de créatio de personnage 
function createPersonnage(string $name, int $level, int $health, int $attack, int $defense)
{

    $name = ucfirst($name);
    $level = $level > 100 ? 100 : $level;
    $health = $health > 100 ? 100 : $health;


    return [


        'name' => $name,
        'level' => $level,
        'health' => $health,
        'attack' => $attack,
        'defense' => $defense,


    ];
}



//Fonction pour réduire la santé du personnage
function reduceHealth(array &$personnage, int $health)
{
    $personnage['health'] -= $health;
}


$personnage = createPersonnage('Merlin', 10, 100, 2, 80);
// echo $personnage['name'] . "r\n";
// echo $personnage['health'] . "r\n";



reduceHealth($personnage, 20);

// echo $personnage['health'];


/////OBJECT 


require_once "Personnage.php";

$merlin = new Personnage('Merlin', 10, 100, 20, 80);

$merlin->attack('Arthur');


echo $merlin->getLevel() . "\r\n";
