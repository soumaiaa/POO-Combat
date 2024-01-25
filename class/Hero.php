<?php
 class Hero
{
    private int $id;
    private string $name;
    private int $health_point=100;
    private string $types;
    private string $icone;

    public function __construct(array $data)
    {
        // $this->id=$data['id'];
        $this->name=$data['name'];
        // $this->health_point=$data['health_point']; 
        $this->types=$data['types']; 
        $this->icone=$data['icone'];
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
    
    public function getTypes()
    {
        return $this->types;
    }
    public function setTypes(string $types)
    {
        $this->types = $types;
    }
    
    public function getIcone()
    {
        return $this->icone;
    }
    public function setIcone(string $icone)
    {
        $this->icone = $icone;
    }
   

    public function hit(Monster $monster)
    {
     $domage=rand(0,50);
     $phMonster=$monster->getPhMonster();
     $monster->setPhMonster($phMonster-$domage);
     
     return $domage;
    } 
}