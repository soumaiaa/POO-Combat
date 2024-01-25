<?php
class Sorcier extends Monster
{
    private string $typeMonster="sorcier";

    public function hitSorcier(Hero $hero)
    {        
    
        $domage=rand(0,50);

        if($this->typeMonster&&$hero->getTypes()==="Guerrier")
        {
            $domage *= 2;
            $phSorcier=$hero->getHealth_point();
            $hero->setHealth_point($phSorcier-$domage);
        }
    
    return $domage;
       }
    }