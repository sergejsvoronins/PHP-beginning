<?php

require 'classes/author-model.php';
require 'classes/author-view.php';



$pdo = require 'partials/connect.php';

$authorModel = new AuthorModel($pdo);
$authorView = new AuthorView();
include 'partials/header.php';
include 'partials/nav.php';
include 'partials/main-start.php';
if(isset($_GET["create"])){
    if($_GET["create"]=="new"){
        $authorView->renderCreateAuthorForm();
    }
}
else {
    $authorView->renderCreateButton();
}
$authorView->renderAllAuthors($authorModel->getAllAuthors());

include 'partials/main-end.php';
include 'partials/footer.php';