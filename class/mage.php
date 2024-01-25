<?php
class Mage extends Hero
{
  private string $types="Mage";
  public function spesialHitMage(Monster $monster)
  { 
    
     $monster->getPhMonster();
     $monster->setPhMonster(0);
     
     return "le monster est mort";    
  }
}
?>