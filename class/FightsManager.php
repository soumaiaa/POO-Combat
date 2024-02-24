<?php
class FightsManager
{
//    private array $tableaux=[];

    public function createMonster()
    {   $types=["ogre", "sorcier", "fantassin"];
        $randomType = $types[array_rand($types)];
        $monster = new Monster($randomType);
        $monster->setNomMonster('zoom');
        $monster->setPhMonster(100);
        $monster->getTypeMonster();
        return $monster;   
    }
    public function fight(Hero $hero,Monster $monster)
    {   
        $tableaux=[];
        while($hero->getHealth_point()>0 && $monster->getPhMonster()>0)
        {
        $domage1=$monster->hit($hero);
        $tableaux[]= $monster->getNomMonster()." a frappé ".$hero->getName()."de ".$domage1. " points de dégâts";   
        if($hero->getHealth_point()<=0){
            $tableaux[]= $hero->getName()." est mort ".$monster->getNomMonster() . "est gagné le combat";
        break;
        }
        $domage2=$hero->hit($monster); 
        $tableaux[]= $hero->getName()." a frappé ".$monster->getNomMonster()."de ".$domage2. " points de dégâts";
         if($monster->getPhMonster()<=0){
            $tableaux[]= $monster->getNomMonster() ." est mort ".$hero->getName()."  est gagné le combat";
        }
    }
        
     return $tableaux;
    }

    }

