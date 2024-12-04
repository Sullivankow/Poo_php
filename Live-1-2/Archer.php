<?php

require_once 'Personnage.php';

class Archer extends Personnage
{
    public function buildArrow()
    {
        $this->increaseLevel();
    }
}