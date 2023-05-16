<?php
require_once 'db.php';
class UserBookModel extends DB {

    protected $table = "userbook";

    public function getAllUserBooks(){
        return $this->getAll($this->table);
    }
    public function getAllReviewsByUser (int $id) {
        $query = "SELECT ub.comment FROM userbook AS ub
                WHERE ub.userId = $id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }
    public function getAllReviewsByBook (int $id) {
        $query = "SELECT ub.comment FROM userbook AS ub
                WHERE ub.bookId = $id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }
}