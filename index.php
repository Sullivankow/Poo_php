<?php

/////OBJECT 


require_once "Personnage.php";

$merlin = new Personnage('Merlin', 100, 5, 80,);
$arthur = new Personnage('Arthur', 100, 80, 10, 100);

// $merlin->attack('Arthur');


echo $merlin->getHealth() . "\r\n";
echo $arthur->getHealth() . "\n\r";

echo "Merlin attaque Arthur" . "\r\n";
$merlin->attack($arthur);


echo $merlin->getHealth() . "\r\n";
echo $arthur->getHealth() . "\n\r";

echo  "\n\r";

echo $merlin->getLevel() . "\r\n";
echo $arthur->getLevel() . "\n\r";

echo  "\n\r";

echo $merlin->getWinCombat() . "\r\n";
echo $arthur->getWinCombat() . "\n\r";
