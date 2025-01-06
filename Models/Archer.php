<?php


require_once "Models/Personnage.php";

class Archer extends Personnage
{

    use DistanceAttackTrait;
    public function buildArrow()
    {


        $this->increaseLevel();
        $this->distAttack();
    }
}
