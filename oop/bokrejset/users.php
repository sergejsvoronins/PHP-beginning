<?php
require 'classes/db.php';
require 'classes/user-view.php';
require 'classes/user-model.php';
require 'classes/userbook-model.php';
require 'classes/userbook-view.php';

$pdo = require 'partials/connect.php';
$db = new DB($pdo);
$userModel = new UserModel($pdo);
$users = $userModel->getAllUsers();
$userView = new UserView();
$userBookModel = new UserBookModel($pdo);
$userBookView = new UserBookView();
include 'partials/header.php';
include 'partials/nav.php';
include 'partials/main-start.php';
if(isset($_GET["create"])){
    if($_GET["create"]=="new"){
        $userView->renderCreateUserForm();
    }
}
else {
    $userView->renderCreateButton();
}
$userView->renderAllUserAsClickableList($users);
if(isset($_GET["id"])){
    $id = filter_var((int)$_GET["id"], FILTER_SANITIZE_NUMBER_INT);
    $userView->renderAllUserComments($userModel->getUserComments($id));
}
include 'partials/main-end.php';
include 'partials/footer.php';