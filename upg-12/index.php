<?php

$countries = [
    [
        "id"=>1,
        "name" => "Sweden",
        "capital" => "Stockholm",
        "continent" => "Europe",
        "isDemocracy" => true,
        "isFamous" => ["Dalahäst", "Gotland", "IKEA"]
    ],
    [
        "id"=>2,
        "name" => "USA",
        "capital" => "Washington",
        "continent" => "North America",
        "isDemocracy" => true,
        "isFamous" => ["Hollywood", "NBA", "NHL"]
    ],
    [
        "id"=>3,
        "name" => "Japan",
        "capital" => "Tokio",
        "continent" => "Asia",
        "isDemocracy" => true,
        "isFamous" => ["Swords", "Samurai"]
    ],
    [
        "id"=>4,
        "name" => "Spain",
        "capital" => "Madrid",
        "continent" => "Europe",
        "isDemocracy" => true,
        "isFamous" => ["Wine", "Beach", "Food"]
    ],
    [
        "id"=>5,
        "name" => "Egypt",
        "capital" => "Cairo",
        "continent" => "Africa",
        "isDemocracy" => true,
        "isFamous" => ["Faraons", "Pyramids", "Deserts"]
    ],
    [
        "id"=>6,
        "name" => "North Korea",
        "capital" => "Cairo",
        "continent" => "Pyongyang",
        "isDemocracy" => false,
        "isFamous" => ["Dictatorship"]
    ],
];

$singleCountrie = [
        "name" => "-",
        "capital" => "-",
        "continent" => "-",
        "isDemocracy" => true,
        "isFamous" => [""]
    ];

if(isset($_GET["id"])){
    $sanitizedId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $chosenId = filter_var($sanitizedId, FILTER_VALIDATE_INT);
    foreach ($countries as $countrie) {
        if($countrie["id"] === $chosenId) {
            $singleCountrie = $countrie;
        }
    }
}
include "view.php"; 

?>