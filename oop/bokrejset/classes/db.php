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
            $query = "SELECT ub.id, ub.userId, ub.bookId, ub.pages, ub.comment, u.firstName, u.lastName, u.email, u.mobile, b.title FROM `userbook` AS ub 
            JOIN users AS u ON u.id=ub.userId 
            JOIN books AS b ON b.id=ub.bookId";
        }
        else {
            $query = "SELECT * FROM $table";
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);   
    }
    public function addUserBook (int $userId, int $bookId, int $pages, string $comment) {
        $query = "INSERT INTO `userbook`(`userId`, `bookId`, `pages`, `comment`) VALUES ('$userId','$bookId', '$pages', '$comment')";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }
    public function getBooksAmountByUser (int $id) {
        $query = "SELECT COUNT(ub.userId) FROM userbook AS ub
                WHERE ub.userId = $id
                GROUP BY ub.userId;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }
    public function getAmountPagesByUser (int $id) {
        $query = "SELECT SUM(ub.pages) FROM userbook AS ub
                WHERE ub.userId = $id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }

    

}