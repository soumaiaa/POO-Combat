<?php
class Orge extends Monster
{   private string $typeMonster="orge";

    public function hitOrge(Hero $hero)
    {        
    
        $domage=rand(0,50);

        if($this->typeMonster && $hero->getTypes()==="Archer")
        {
            $domage *= 2;
            $phSorcier=$hero->getHealth_point();
            $hero->setHealth_point($phSorcier-$domage);
        }
    
    return $domage;
       }
    }
?>