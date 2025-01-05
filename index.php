<?php

/////OBJECT 


require_once "Personnage.php";

$merlin = new Personnage('Merlin', 100, 50, 80, 100);
$arthur = new Personnage('Arthur', 100, 80, 10, 100);

// $merlin->attack('Arthur');


echo $merlin->getLevel() . "\r\n";
echo $arthur->getHealth() . "\n\r";

echo "Merlin attaque Arthur" . "\r\n";
$merlin->attack($arthur);


echo $merlin->getLevel() . "\r\n";
echo $arthur->getHealth() . "\n\r";
