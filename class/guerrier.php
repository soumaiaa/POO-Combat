<?php
class Guerrier extends Hero
{
    
  public function hit(Monster $monster)
  { 
    $domage=70;
     $phMonster=$monster->getPhMonster();
     $monster->setPhMonster($phMonster-$domage);
     
     return $domage;    
  }
}
?>