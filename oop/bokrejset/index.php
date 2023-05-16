<?php

require 'classes/db.php';


$pdo = require 'partials/connect.php';

$db = new DB($pdo);




if(isset($_GET["id"])){
    $userId = $_GET["id"];
}

include 'partials/header.php';
include 'partials/nav.php';

include 'partials/footer.php';
