<?php
$pdo = require "connection.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST["name"], $_POST["year"], $_POST["author_id"])){
        $name = filter_var($_POST["name"], FILTER_SANITIZE_SPECIAL_CHARS) ;
        $year = filter_var($_POST["year"], FILTER_SANITIZE_NUMBER_INT);
        $author_id = filter_var($_POST["author_id"], FILTER_SANITIZE_NUMBER_INT);
        $data = [
            'name' => $name,
            'year' => $year,
            'author_id' => $author_id
        ];
        $sql = "INSERT INTO books (name, year, author_id) VALUES (:name,:year, :author_id)";
        $statement = $pdo->prepare($sql);
        $statement->execute($data);
    }
}
header("Location: index.php");

