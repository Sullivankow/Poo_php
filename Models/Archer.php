<?php

require_once "DistanceAttackTrait.php";

require_once "Personnage.php";

class Archer extends Personnage
{

    use DistanceAttackTrait;
    public function buildArrow()
    {


        $this->increaseLevel();
        $this->distAttack();
    }
}
