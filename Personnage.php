<?php

class Personnage
{
    private int $winCombat = 0;

    public function __construct(
        private string $name,
        private int $health,
        private int $attack,
        private int $defense,
        private int $level = 1,
    ) {
    }

    public function reduceHealth(int $health)
    {
        $this->health -= $health;
    }

    public function attack(string $name)
    {
        $enemyDefense = rand(0, 100);

        if ($this->attack > $enemyDefense) {
            $this->level++;
        } else {
            $this->level--;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getLevel(): int
    {
        return $this->level;
    }
    public function getHealth(): int
    {
        return $this->health;
    }

    public function setHealth(int $health): self
    {
        $this->health = $health;
        return $this;
    }

    public function getAttack(): int
    {
        return $this->attack;
    }

    public function setAttack(int $attack): self
    {
        $this->attack = $attack;
        return $this;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): self
    {
        $this->defense = $defense;
        return $this;
    }
}