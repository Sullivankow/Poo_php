<?php

class Personnage
{

    public function __construct(
        private string $name,
        private int $health,
        private int $attack,
        private int $defense,
        private int $level = 1
    ) {}



    public function reduceHealth(int $health)
    {
        $this->health -= $health;
    }





    //Si l'attaque est au dessus de 50, il gagne un niveau sinon il perd un niveau 
    public function attack(Personnage $enemy)
    {

        if ($this->attack > $enemy->getDefense()) {
            $enemy->setHealth($enemy->getHealth() - ($this->attack - $enemy->getDefense())); //100 - (20 - 10), on récupère la santé de l'ennemi qui est de 100, - la différence entre l'attaque de notre personnage et la défense de l'ennemi
        } else {
            $this->setHealth($this->getHealth() - ($enemy->getDefense() - $this->attack)); // On récuère la santé de notre personnage - la différence entre la défense de l'ennemi et notre personnage
        }
    }







    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of level
     */
    public function getLevel(): int
    {
        return $this->level;
    }



    /**
     * Get the value of health
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * Set the value of health
     */
    public function setHealth(int $health): self
    {
        $this->health = $health < 0 ? 0 : $health;

        return $this;
    }

    /**
     * Get the value of attack
     */
    public function getAttack(): int
    {
        return $this->attack;
    }

    /**
     * Set the value of attack
     */
    public function setAttack(int $attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    /**
     * Get the value of defense
     */
    public function getDefense(): int
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     */
    public function setDefense(int $defense): self
    {
        $this->defense = $defense;

        return $this;
    }
}
