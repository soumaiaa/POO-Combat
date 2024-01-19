<?php
class FightsManager
{
//    private array $tableaux=[];

    public function createMonster()
    {
        $monster = new Monster();
        $monster->setNomMonster('zoom');
        $monster->setPhMonster(100);
        return $monster;
       
    }
    public function fight(Hero $hero,Monster $monster)

    {   
        $tableaux=[];
       
        do
        {
        
        $domage1=$monster->hit($hero);
        $tableaux[]= $monster->getNomMonster()." a frappé ".$hero->getName()."de ".$domage1. " points de dégâts";   
       
        $domage2=$hero->hit($monster); 
        $tableaux[]= $hero->getName()." a frappé ".$monster->getNomMonster()."de ".$domage2. " points de dégâts";
        
    }while($hero->getHealth_point()>0 && $monster->getPhMonster()>0);
     return $tableaux;
    }

    }

