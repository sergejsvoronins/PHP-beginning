<?php
require_once 'db.php';
require 'user.php';
class UserModel extends DB {

    protected $table = "users";
    public function convertToUserClass (array $users) : array {
        $classUsers = [];
        foreach ($users as $element) {
            $user = new User ($element["id"], $element["first_name"], $element["last_name"], $element["email"], $element["mobile"]);
            array_push($classUsers, $user);
        }
        return $classUsers;
    }
    public function getAllUsers() : array {
        return $this->convertToUserClass($this->getAll($this->table));
    }
    public function getUser ($id) : array {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);  
        return $this->convertToUserClass($stmt->fetchAll(PDO::FETCH_ASSOC)) ;
    }
    public function createUser (string $firstName, string $lastName, string $email, string $mobile) : void {
        $query = "INSERT INTO $this->table (`first_name`, `last_name`, `email`, `mobile`) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$firstName, $lastName, $email, $mobile]);
    }

    public function findUsers (string $text) : array{
        $query = "SELECT * FROM $this->table WHERE users.first_name LIKE '%$text%' OR users.last_name LIKE '%$text%';";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $this->convertToUserClass($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    public function deleteUser (int $id) : void {
        $query = "DELETE FROM users WHERE users.id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
    }
    public function getUserComments (int $userId):array {
        $query = "SELECT userbook.comment FROM users
        JOIN userbook ON userbook.user_id=users.id
        WHERE users.id = ?;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$userId]);  
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}