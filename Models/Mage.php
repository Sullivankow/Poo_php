<?php


require_once "Models/Personnage.php";

class Mage extends Personnage
{


    use DistanceAttackTrait;

    public function distAttack() {}
}
