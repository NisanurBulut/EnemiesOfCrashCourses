<?php


namespace app\models;
use app\Database;
use app\helpers\UtilHelper;

class Enemy
{
    public ?int $id = null;
    public string $name;
    public string $description;
    public string $movie;
    public array $imageFile;
    public ?string $imagePath = null;

    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->movie = $data['movie'];
        $this->imageFile = $data['imageFile'];
        $this->imagePath = $data['image'] ?? null;
    }

    public function save()
    {
        $errors = [];
        if (!is_dir(__DIR__ . '/../../public/images')) {
            mkdir(__DIR__ . '/../../public/images');
        }

        if (!$this->enemy) {
            $errors[] = 'Enemy is required';
        }

        if (!$this->movie) {
            $errors[] = 'Enemy movie is required';
        }

        if (empty($errors)) {
            if ($this->imageFile && $this->imageFile['tmp_name']) {
                if ($this->imagePath) {
                    unlink(__DIR__ . '../../public' . $this->imagePath);
                }
                $this->imagePath = 'images/' . UtilHelper::randomString(8) . '/' . $this->imageFile['name'];
                mkdir(dirname(__DIR__ . '/../../public/' . $this->imagePath));
                move_uploaded_file($this->imageFile['tmp_name'], __DIR__ . '/../../public/' . $this->imagePath);
            }

            $db = Database::$db;
            if ($this->id) {
                $db->updateEnemy($this);
            } else {
                $db->createEnemy($this);
            }

        }
    }
}