<?php

require_once 'db.php';
require 'book.php';
class BookModel extends DB {

    protected $table = "books";

    public function getAllBooks(){
         $books = [];
        // return $this->getAll($this->table);
        $ass_array =  $this->getAll($this->table);
        foreach ($ass_array as $element) {
            $book = new Book ($element["id"], $element["title"], $element["year"]);
            array_push($books, $book);
        }
        return $books;
    }
    public function createBook (string $title,  int $year, int $authorId) {
        $query = "INSERT INTO $this->table (`title`, `year`, `author_id`) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$title, $year, $authorId]);
    }
    public function findBooks (string $text) : array{
        $books = [];
        $query = "SELECT * FROM books WHERE books.title LIKE '%$text%';";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $ass_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($ass_array as $element) {
            $book = new Book ($element["id"], $element["title"], $element["year"]);
            array_push($books, $book);
        }
        return $books;
    }
    public function getAllBooksWithStudentsCount () {
        $query = "SELECT *, COUNT(books.id) AS 'students_count' FROM books
                    JOIN userbook ON userbook.book_id = books.id
                    GROUP BY books.id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}