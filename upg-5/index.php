<?php
    $allColors = ["red", "green", "blue", "yellow", "pink", "gray", "purple", "orange", "brown", "black"];
    $squreSize = 0;
    if(isset($_POST["squareSize"])){
        $squreSize = $_POST["squareSize"];
        $squaresAmount = 0;
        $usedColors = [];
        $i = 0;
        if(isset($_POST["squareSize"])){
            $squaresAmount = $squreSize*$squreSize;
            while ($i < $squreSize) {
                $chosenColor = $allColors[rand(0, sizeof($allColors)-1)];
                if(sizeof($usedColors)===0){
                    array_push($usedColors, $chosenColor);
                    $i=$i+1;
                }
                else {
                    $found = 0;
                    foreach($usedColors as $color){
                        if($color == $chosenColor) {
                            $found++;
                        }
                    }
                    if($found == 0){
                        array_push($usedColors, $chosenColor);
                        $i++;
                    }
                }
            }
        }
    }

    function createSquares ($allColors, $squaresAmount) {
        echo "<br><div class='five'
            style='width:". $GLOBALS["squreSize"]*52 ."px;'>";
            for ($i=0; $i < $squaresAmount; $i++) { 

                $randomNumber = rand(0,sizeof($allColors)-1);
                echo "<div 
                    style='background-color:" . $allColors[$randomNumber] . ";'></div>";
            }
        echo "</div><br>";
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
        <form action="" method = "post">
            <label for="squareSize">Välj storlek</label>
            <input type="number"  id="squareSize" name ="squareSize" max="<?=sizeof($allColors)?>">
            <button>Submit</button>
        </form>
        <br>
        <?php
            if(isset($_POST["squareSize"])){
                createSquares($usedColors, $squaresAmount);
            }
            else {
                ?>
                <h4>Ange nummer</h4>
                <?php
            }
        ?>
</body>
</html>
