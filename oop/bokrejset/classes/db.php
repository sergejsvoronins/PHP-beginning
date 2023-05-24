<?php

class DB {

    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($table)
    {
        if($table == "userbook"){
            $query = "SELECT ub.id, ub.user_id, ub.book_id, ub.pages, ub.comment, u.first_name, u.last_name, u.email, u.mobile, b.title FROM `userbook` AS ub 
            JOIN users AS u ON u.id=ub.user_id 
            JOIN books AS b ON b.id=ub.book_id";
        }
        else {
            $query = "SELECT * FROM $table";
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);   
    }
    public function addUserBook (int $userId, int $bookId, int $pages, string $comment) {
        $query = "INSERT INTO `userbook`(`user_id`, `book_id`, `pages`, `comment`) VALUES ('$userId','$bookId', '$pages', '$comment')";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }
    public function getBooksAmountByUser (int $id) {
        $query = "SELECT COUNT(ub.user_id) FROM userbook AS ub
                WHERE ub.user_id = $id
                GROUP BY ub.user_id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }
    public function getAmountPagesByUser (int $id) {
        $query = "SELECT SUM(ub.pages) FROM userbook AS ub
                WHERE ub.user_id = $id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }

    

}