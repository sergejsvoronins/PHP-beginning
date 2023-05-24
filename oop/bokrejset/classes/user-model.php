<?php
require_once 'db.php';
class UserModel extends DB {

    protected $table = "users";

    public function getAllUsers(){
        return $this->getAll($this->table);
    }
    public function createUser (string $firstName, string $lastName, string $email, string $mobile) {
        $query = "INSERT INTO $this->table (`first_name`, `last_name`, `email`, `mobile`) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$firstName, $lastName, $email, $mobile]);
    }
    public function deleteUser (int $id) {
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