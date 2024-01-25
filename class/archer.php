<?php
class Archer extends Hero
{
    private string $types="Archer";
    
  public function spesialHitMage(Monster $monster)
  { 
    $domage=0;
     $phMonster=$monster->getPhMonster();
     $monster->setPhMonster($phMonster-$domage);
     
     return $domage;    
  }
}
?>