<?php

require 'classes/db.php';
require 'classes/user.php';
require 'classes/user-view.php';
require 'classes/book.php';
require 'classes/book-view.php';
require 'classes/userbook.php';
require 'classes/userbook-view.php';
$pdo = require 'partials/connect.php';

$db = new DB($pdo);
$userModel = new User($pdo);
$users = $userModel->getAllUsers();
$userView = new UserView();
$bookModel = new Book($pdo);
$bookView = new BookView();
$userBookModel = new UserBook($pdo);
$userBookView = new UserBookView();


if(isset($_GET["id"])){
    $userId = $_GET["id"];
}

include 'partials/header.php';
$userView->renderAllUserAsClickableList($users);
$userModel->createUser("Frej", "Voronins", "f@v.se", "0720253350");
// $bookView->renderAllBooksAsList($bookModel->getAllBooks());
// $userBookView->renderAllUserBooksAsList($userBookModel->getAllUserBooks());
// våran apps vyer här

// gör om för tre tabeller!
include 'partials/footer.php';
