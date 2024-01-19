<?php
class Hero
{
    private int $id;
    private string $name;
    private int $health_point=100;

    public function __construct(array $data)
    {
        // $this->id=$data['id'];
        $this->name=$data['name'];
        // $this->health_point=$data['health_point']; 
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getHealth_point()
    {
        return $this->health_point;
    }

    public function setHealth_point(int $health_point): void
    {
        $this->health_point = $health_point;
    }


    public function hit(Monster $monster)
    {
     $domage=rand(0,50);
     $phMonster=$monster->getPhMonster();
     $monster->setPhMonster($phMonster-$domage);
     
     return $domage;
    } 
}