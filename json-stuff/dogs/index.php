<?php
/*$dog = array(
    array(
        'name' => "Sigge", 
        'breed' => "okänd", 
        'height' => 50, 
        'age' => 5, 
        'color' => "vit"
    ),
    array(
        'name' => "Lisa", 
        'breed' => "okänd", 
        'height' => 75, 
        'age' => 8, 
        'color' => "brown"
    ),
);*/
$pdo = require 'connect.php';
$sql = "SELECT * FROM dogs";
$statement = $pdo->query($sql);
$dogs = $statement->fetchAll(PDO::FETCH_ASSOC);
header("Content-Type: application/json");
echo json_encode($dogs);


