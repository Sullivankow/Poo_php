<?php

class Personnage
{


    private int $winCombat = 0;


    private const MIN_HEALTH = 10;

    private const MAX_LEVEL = 100; //Je définis la constante pour le niveau max et stock 100 dans la variable MAX_LEVEL    
    private const MIN_LEVEL = 1;
    public const ATTACK_ACTION_KEY = 'attack';
    public const DEFENSE_ACTION_KEY = 'defense';




    public function __construct(
        private string $name,
        private int $health,
        private int $attack,
        private int $defense,
        private int $level = self::MIN_LEVEL,
    ) {}









    //Si l'attaque est au dessus de 50, il gagne un niveau sinon il perd un niveau 
    public function attack(Personnage $enemy)
    {

        if ($this->attack > $enemy->getDefense()) {

            $enemy->setHealth($enemy->getHealth() - ($this->attack - $enemy->getDefense())); //100 - (20 - 10), on récupère la santé de l'ennemi qui est de 100, - la différence entre l'attaque de notre personnage et la défense de l'ennemi
            $this->increaseLevel(self::ATTACK_ACTION_KEY); //Notre personnage gagne, l'ennemi perd
            $enemy->decreaseLevel();


            $this->increaseWinCombat();
            $enemy->decreaseWinCombat();
        } else {
            $this->setHealth($this->getHealth() - ($enemy->getDefense() - $this->attack)); // On récuère la santé de notre personnage - la différence entre la défense de l'ennemi et notre personnage
            $this->decreaseLevel();
            $enemy->increaseLevel();

            $this->decreaseWinCombat(); //Notre personnage perd, l'ennemi gagne
            $enemy->increaseWinCombat(self::DEFENSE_ACTION_KEY);
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
        $this->health = $health < self::MIN_HEALTH ? 0 : $health;

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

    public function getWinCombat(): int
    {

        return $this->winCombat;
    }

    public function increaseWinCombat(): self  //Fonction pour incrémenter le nombre de combat de 1 lorque l'ennemi n'a plus de santé
    {

        $this->winCombat++;

        return $this;
    }

    public function decreaseWinCombat(): self //Fonction pour décrémenter le nombre de combat de 1 lorque notre personnage n'a plus de santé
    {

        $this->winCombat--;

        return $this;

        if ($this->winCombat == 0) {
            $this->winCombat = 0;
        }
    }


    //Fonction pour augmenter le niveau des personnages

    protected function increaseLevel(?string $type = null): void
    {
        if (self::ATTACK_ACTION_KEY === $type) {
            $this->level += 2;
        } elseif (self::DEFENSE_ACTION_KEY === $type) {

            $this->level += 3;
        } else {
            $this->level += 1;
        }

        $this->level++;
        if ($this->level > self::MAX_LEVEL) {  //Self sert à appeler des éléments statiques 
            $this->level = self::MAX_LEVEL;
        }
    }

    //Fonction pour baisser d'un level 
    private function decreaseLevel(): void
    {

        $this->level--; //Si le level est inférieur à la constante 1 alors il est égal à 1
        if ($this->level < self::MIN_LEVEL) {
            $this->level = self::MIN_LEVEL;
        }
    }
}
