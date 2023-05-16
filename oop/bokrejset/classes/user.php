<?php

class User extends DB {

    protected $table = "users";

    public function getAllUsers(){
        return $this->getAll($this->table);
    }
    public function createUser (string $firstName, string $lastName, string $email, string $mobile) {
        $query = "INSERT INTO $this->table (`firstName`, `lastName`, `email`, `mobile`) VALUES ('$firstName','$lastName','$email','$mobile')";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }
}