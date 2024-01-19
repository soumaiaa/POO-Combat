<?php
class Monster 
{
    private string $nomMonster;
    private int $phMonster=100;

    public function getNomMonster()
    {
        return $this->nomMonster;
    }

    public function setNomMonster(string $nomMonster)
    {
        $this->nomMonster = $nomMonster;
    }

    public function getPhMonster()
    {
        return $this->phMonster;
    }

    public function setPhMonster(int $phMonster)
    {
        $this->phMonster = $phMonster;
    }
    public function hit(Hero $hero)
    {
     $domage=rand(0,50);
     $phHero=$hero->getHealth_point();
     $hero->setHealth_point($phHero-$domage);
     
     return $domage;
    } 
}
?>