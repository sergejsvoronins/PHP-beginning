<?php

require_once 'db.php';
class AuthorModel extends DB {

    protected $table = "authors";

    public function getAllAuthors(){
        return $this->getAll($this->table);
    }

    public function createAuthor($firstName, $lastName){
        $query = "INSERT INTO $this->table (`first_name`, `last_name`) VALUES (?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$firstName, $lastName]);
    }

}