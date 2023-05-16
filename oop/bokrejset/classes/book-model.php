<?php

require_once 'db.php';
class BookModel extends DB {

    protected $table = "books";

    public function getAllBooks(){
        return $this->getAll($this->table);
    }
    public function createBook (string $title,  int $year, int $authorId) {
        $query = "INSERT INTO $this->table (`title`, `year`, `author_id`) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$title, $year, $authorId]);
    }
}