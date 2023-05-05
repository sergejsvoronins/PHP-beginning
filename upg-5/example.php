<?php

 function getOneColor($colors){
    // get a random color from the $colors array
    $rand_index = mt_rand(0, count($colors)-1);
    return $colors[$rand_index];
 }

 function initColors(){
    return ["purple", "pink", "hotpink", "lightgreen", "lightblue"];
 }
 function cutOneColor($colors){
    global $colors;

    // get a random color from the $colors array
    if(count($colors) === 0){
        $colors = initColors();
    }
    $rand_index = mt_rand(0, count($colors)-1);
    return array_splice($colors,$rand_index,1)[0];
 }

 // number of columns and rows in the pattern
 $pattern_size = 5;

 // available colors are set in initColors
 $colors = [];

 // store the colors of the 5x5 square pattern
 $pattern = [];

 // generate square pattern and store in $pattern
 for($i=0; $i<$pattern_size; $i++){
    // generate row
    $pattern_row = [];
    for($j=0; $j<$pattern_size; $j++){
        array_push($pattern_row, cutOneColor($colors));
    }
    array_push($pattern, $pattern_row);
 }

 $output = "<section>";
 foreach($pattern as $row){
    $output .= "<div class='row'>";
    foreach($row as $color_div){
        $output .= "<div class='box' style='background-color: $color_div'></div>";
    }
    $output .= "</div>";
 }
$output .= "</section>";

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Squares</title>
    <style>
        .row {
            display:flex;
            flex-direction: row;
        }
        .box {
            width: 50px;
            height: 50px;
            border: solid 1px black;
        }
    </style>
 </head>
 <body>
    <?= $output ?>
 </body>
 </html>