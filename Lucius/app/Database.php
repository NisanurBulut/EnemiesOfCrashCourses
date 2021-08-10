<?php


namespace app;

use PDO;

class Database
{
    public \PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=127.0.0.1;user=root;dbname=dbsonofaltar');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getEnemies($search = ' ')
    {
        if ($search) {
            $statement = $this->pdo->prepare('select * from tEnemy where name like name:$search');
            $statement->bindValue(':name', "%$search%");
        } else {
            $statement = $this->pdo->prepare('select * from tEnemy');
        }
        $statement->execute();
        $enemies = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}