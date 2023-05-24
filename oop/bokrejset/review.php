<?php
require 'classes/db.php';

require 'classes/userbook-model.php';
require 'classes/userbook-view.php';

$pdo = require 'partials/connect.php';
$db = new DB($pdo);

$userBookModel = new UserBookModel($pdo);
$userBookView = new UserBookView();

include 'partials/header.php';
include 'partials/nav.php';
include 'partials/main-start.php';

$userBookView->renderReviewTableByPages($userBookModel->getReviewByRedPages());
include 'partials/main-end.php';
include 'partials/footer.php';
