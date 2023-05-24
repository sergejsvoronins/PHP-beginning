<?php
$arr = array (
    "a" => 1,
    "b" => 2,
    "c" => 3,
    "result" => array (
        array(
            "name" => "Name1",
            "color" => "darkblue",
            "age" => "358",
            "arms" => "6",
            "eyes" => "1"
        ),
        array(
            "name" => "Name2",
            "color" => "gray",
            "age" => "1298",
            "arms" => "2",
            "eyes" => "4"
        ),
        array(
            "name" => "Name3",
            "color" => "brown",
            "age" => "549",
            "arms" => "4",
            "eyes" => "2"
        ),
        array(
            "name" => "Name4",
            "color" => "orange",
            "age" => "128",
            "arms" => "8",
            "eyes" => "6"
        ),
    )
    );
header("Content-Type: application/json");
echo json_encode($arr);