<?php

require 'classes/book-model.php';
require 'classes/book-view.php';
require 'classes/author-model.php';



$pdo = require 'partials/connect.php';

$bookModel = new BookModel($pdo);
$bookView = new BookView();
$authorModel = new AuthorModel($pdo);
include 'partials/header.php';
include 'partials/nav.php';
include 'partials/main-start.php';
$bookView->createSearchField();
if(isset($_GET["create"])){
    if($_GET["create"]=="new"){
        $bookView->renderCreateBookForm($authorModel->getAllAuthors());
    }
}
else {
    $bookView->renderCreateButton();
}

if(isset($_POST["search-title"])){
    $searchText = filter_var($_POST["search-title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $bookView->renderAllBooksAsList($bookModel->findBooks($searchText));
}
else {
    $bookView->renderAllBooksAsListWithCount($bookModel->getAllBooksWithStudentsCount()); 
}


include 'partials/main-end.php';
include 'partials/footer.php';