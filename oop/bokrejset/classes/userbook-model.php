<?php
require_once 'db.php';
class UserBookModel extends DB {

    protected $table = "userbook";

    public function getAllUserBooks():array{
        return $this->getAll($this->table);
    }
    public function getAllReviewsByUser (int $id):void {
        $query = "SELECT ub.comment FROM userbook AS ub
                WHERE ub.user_id = $id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }
    public function createUserBook (int $userId, int $bookId, int $pages, string $comment) : void{
        $query = "INSERT INTO $this->table (`user_id`, `book_id`, `pages`, `comment`) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$userId, $bookId, $pages, $comment]);
    }
    public function getReviewByRedPages (): array {
        $query = "SELECT users.first_name, users.last_name, COUNT(userbook.user_id) AS 'books_amount', SUM(userbook.pages) AS 'number_of_pages' FROM `userbook` JOIN users ON users.id = userbook.user_id
                    GROUP BY userbook.user_id
                    ORDER BY  number_of_pages DESC;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}