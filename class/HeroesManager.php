<?php
class HeroesManager
{
    private PDO $db;
    private array $heroes = [];
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function add(Hero $hero): void
    {

            $request = $this->db->prepare("INSERT INTO heroes (name,health_point, types, icone) VALUES (:name, :health_point, :types, :icone)");
            $request->execute([
                //  'id'=>$hero->getId(),
                'name' => $hero->getName(),
                'health_point' => $hero->getHealth_point(),
                'types' => $hero->getTypes(),
                'icone' =>$hero->getIcone()

            ]);
            $id = $this->db->lastInsertId();
            $hero->setId($id);
        // }
    }
    public function findAllAlive()
    {

        $request = $this->db->query('SELECT * FROM heroes WHERE heroes.health_point>0');
        $Heroes = $request->fetchAll();
        foreach ($Heroes as $hero) {
            $newHero = new Hero($hero);
            $newHero->setId($hero['id']);
            $newHero->setHealth_point($hero['health_point']);
            $newHero->setIcone($hero['icone']);
            $this->heroes[] = $newHero;
        }
        return $this->heroes;
    }
    public function find($id)
    {
        $request = $this->db->query('SELECT * FROM heroes WHERE  id=' . $id);
        $hero = $request->fetch();
        $newHero = new Hero($hero);
        $newHero->setId($hero['id']);
        return $newHero;
    }
    public function update(Hero $hero)
    {
        $request = $this->db->prepare('UPDATE heroes SET health_point = :health_point WHERE id = :id');
        $request->execute([
            ':health_point' => $hero->getHealth_point(),
            ':id' => $hero->getId()
        ]);
    }
}
