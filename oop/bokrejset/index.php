<?php

require 'classes/db.php';
require 'classes/userbook-model.php';
require 'classes/userbook-view.php';
require 'classes/user-model.php';
require 'classes/book-model.php';


$pdo = require 'partials/connect.php';

$db = new DB($pdo);




// if(isset($_GET["id"])){
//     $userId = $_GET["id"];
// }
$userBookModel = new UserBookModel($pdo);
$userModel = new UserModel($pdo);
$bookModel = new BookModel($pdo);
$userBookView = new UserBookView();

include 'partials/header.php';
include 'partials/nav.php';
include 'partials/main-start.php';

$userBookView->renderCreateUserBookForm($userModel->getAllUsers(), $bookModel->getAllBooks());
include 'partials/main-end.php';
include 'partials/footer.php';
