<?php

require 'classes/book-model.php';
require 'classes/book-view.php';
require 'classes/userbook-model.php';
require 'classes/userbook-view.php';
$pdo = require 'partials/connect.php';

$bookModel = new BookModel($pdo);
$bookView = new BookView();
$reviewModel = new UserBookModel($pdo);
$reviewView = new UserBookView();

include 'partials/header.php';
include 'partials/nav.php';
if(isset($_GET["id"])){
    $id=filter_var((int)$_GET["id"], FILTER_SANITIZE_NUMBER_INT);
    $bookView->renderSingleBook($bookModel->getAllBooks(), $id);
    $reviewView->renderAllBookCommentsAsList($reviewModel->getAllUserBooks(), $id);
}
include 'partials/footer.php';

