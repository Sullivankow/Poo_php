<?php


require_once "Personnage.php";

class Mage extends Personnage
{


    use DistanceAttackTrait;

    public function distAttack() {}
}
