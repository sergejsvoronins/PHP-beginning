<?php
    $colors = ["red", "green", "blue", "yellow", "pink", "gray", "purple", "orange", "brown", "black"];
    $squreSize = 5;
    $squaresAmount = $squreSize*$squreSize;

    function createSquares ($colors, $squaresAmount) {
        echo "<div class='five'>";
            for ($i=0; $i < $squaresAmount; $i++) { 
                $randomNumber = rand(0,sizeof($colors)-1);
                echo "<div style='background-color:" . $colors[$randomNumber] . ";'></div>";
            }
        echo "</div>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
        createSquares($colors, $squaresAmount);
    ?>
</body>
</html>
