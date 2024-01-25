<?php
class Fantassin extends Monster
{
    private string $typeMonster="fantassin";
    public function hitFantassin(Hero $hero)
    {        
        
        $domage=rand(0,50);

        if($this->typeMonster&&$hero->getTypes()==="Mage")
        {
            $domage *= 2;
            $phSorcier=$hero->getHealth_point();
            $hero->setHealth_point($phSorcier-$domage);
        }
    
    return $domage;
       }
    }