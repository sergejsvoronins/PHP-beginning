<?php
require "connection.php";
if(isset($_POST["name"]) && isset($_POST["color"]) && isset($_POST["age"]) && isset($_POST["breed"]) && isset($_POST["weight"]) && isset($_POST["height"])){
    $name = $_POST["name"];
    $color = $_POST["color"];
    $age = (int)$_POST["age"];
    $breed = $_POST["breed"];
    $weight = (float)$_POST["weight"];
    $height = (float)$_POST["height"];
    $sql1 = "INSERT INTO `dogs` (`name`, `color`, `age`, `breed`, `weight`, `height`) VALUES ('$name', '$color', '$age', '$breed', '$weight', '$height');";
    $pdo->query($sql1);
}
header("Location: index.php");
exit;

