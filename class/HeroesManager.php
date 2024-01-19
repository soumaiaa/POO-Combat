<?php
class HeroesManager
{
    private PDO $db;
    private array $heroes= [];
    public function __construct(PDO $db)
   {
        $this->db = $db;
   }
   public function add(Hero $hero) : void 
   {
   
       $request = $this->db->prepare("INSERT INTO heroes (name,health_point) VALUES (:name, :health_point)");
       $request->execute([
        //  'id'=>$hero->getId(),
        'name' => $hero->getName(),
        'health_point'=>$hero->getHealth_point()
        
       ]);
       $id = $this->db->lastInsertId();
       $hero->setId($id);

    }
    public function findAllAlive()
    {
        $request = $this->db->query('SELECT * FROM heroes WHERE health_point>0'); 
        $Heroes = $request->fetchAll();
        foreach($Heroes as $hero)
        {
            $newHero = new Hero($hero);
            $newHero->setId($hero['id']);
            $this->heroes[]=$newHero;
        }
        return $this->heroes;
    }
    public function find($id)
    {
        $request = $this->db->query('SELECT * FROM heroes WHERE  id='.$id); 
        $hero = $request->fetch();
        $newHero = new Hero($hero); 
        $newHero->setId($hero['id']);
        return $newHero;
    }
    public function update(Hero $hero)
    { $request = $this->db->prepare('UPDATE heroes SET health_point = :health_point WHERE id = :id');
        $request->execute([
            ':health_point' => $hero->getHealth_point(),
            ':id'=>$hero->getId()
        ]);
    }
  
       
    
} 
?>