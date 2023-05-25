<?php
require 'classes/db.php';

require 'classes/review-model.php';
require 'classes/review-view.php';

$pdo = require 'partials/connect.php';

$reviewkModel = new ReviewModel($pdo);
$reviewkView = new ReviewView();


include 'partials/header.php';
include 'partials/nav.php';

$reviewkView->renderReviewTableByPages($reviewkModel->getReviewByRedPages());

include 'partials/footer.php';
