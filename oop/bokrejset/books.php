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

$bookView->renderCreateBookForm($authorModel->getAllAuthors());
$bookView->renderAllBooksAsList($bookModel->getAllBooks());

include 'partials/footer.php';