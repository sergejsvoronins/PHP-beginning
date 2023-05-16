<?php

class DB {

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($table)
    {
        if($table == "userbook"){
            $query = "SELECT ub.id, ub.userId, ub.bookId, ub.pages, ub.comment, u.firstName, u.lastName, u.email, u.mobile, b.title, b.author FROM `userbook` AS ub 
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
    public function createBook (string $title, string $author) {
        $query = "INSERT INTO `books`(`title`, `author`) VALUES ('$title','$author')";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }
    // public function createUser (string $firstName, string $lastName, string $email, string $mobile) {
    //     $query = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `mobile`) VALUES ('$firstName','$lastName', '$email', '$mobile')";
    //     $stmt = $this->pdo->prepare($query);
    //     $stmt->execute();
    // }
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
    public function getAllReviewsByUser (int $id) {
        $query = "SELECT ub.comment FROM userbook AS ub
                WHERE ub.userId = $id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }
    

}