<?php
$pdo = require '../partials/connect.php';

require '../classes/userbook-model.php';

$userBookModel = new UserBookModel($pdo);
if((isset($_POST["user_id"], $_POST["book_id"],$_POST["pages"],$_POST["comment"])) 
    && $_POST["user_id"] !== "" 
    && $_POST["book_id"] !== "" 
    && $_POST["pages"] !== "" 
    ){
        $userId =  filter_var((int)$_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
        $bookId =  filter_var((int)$_POST['book_id'], FILTER_SANITIZE_NUMBER_INT);
        $pages =  filter_var((int)$_POST['pages'], FILTER_SANITIZE_NUMBER_INT);
        $comment = filter_var($_POST["comment"], FILTER_SANITIZE_SPECIAL_CHARS);
        $userBookModel->createUserBook($userId, $bookId, $pages, $comment);
        echo $userId;
        echo $bookId;
        echo $pages;
        echo $comment;
    }
header("Location: ../index.php");
exit;