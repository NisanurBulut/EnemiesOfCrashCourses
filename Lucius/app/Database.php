<?php


namespace app;

use PDO;
use app\models\Enemy;

class Database
{
    public $pdo = null;
    public static ?Database $db = null;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=127.0.0.1;user=root;dbname=dbsonofaltar');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db = $this;
    }

    public function getEnemys($keyword = '')
    {
        if ($keyword) {
            $statement = $this->pdo->prepare('SELECT * FROM tEnemy WHERE name like :keyword ORDER BY create_date DESC');
            $statement->bindValue(":keyword", "%$keyword%");
        } else {
            $statement = $this->pdo->prepare('SELECT * FROM tEnemy ORDER BY create_date DESC');
        }
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEnemyById($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM tEnemy WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteEnemy($id)
    {
        $statement = $this->pdo->prepare('DELETE FROM tEnemy WHERE id = :id');
        $statement->bindValue(':id', $id);

        return $statement->execute();
    }

    public function updateEnemy(Enemy $enemy)
    {
        $statement = $this->pdo->prepare("UPDATE tEnemy SET name = :name, 
                                        image = :image, 
                                        description = :description, 
                                        movie = :movie WHERE id = :id");
        $statement->bindValue(':name', $enemy->name);
        $statement->bindValue(':image', $enemy->imagePath);
        $statement->bindValue(':description', $enemy->description);
        $statement->bindValue(':movie', $enemy->movie);
        $statement->bindValue(':id', $enemy->id);

        $statement->execute();
    }

    public function createEnemy(Enemy $enemy)
    {
        $statement = $this->pdo->prepare("INSERT INTO tEnemy (name, image, description, movie, create_date)
                VALUES (:name, :image, :description, :movie, :date)");
        $statement->bindValue(':name', $enemy->name);
        $statement->bindValue(':image', $enemy->imagePath);
        $statement->bindValue(':description', $enemy->description);
        $statement->bindValue(':movie', $enemy->movie);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));

        $statement->execute();
    }
}