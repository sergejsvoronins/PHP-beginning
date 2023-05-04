<?php 
    $colors = ["red", "blue", "yellow", "pink", "green"];
    $names1 = ["Goblinn", "Devil", "Satan", "Snake", "Spider"];
    $names2 = ["Dark", "Crazy", "Bad", "Funny", "Super"];
    $varelser = [];
    $number = $_POST['number'];
    function createMonster () {
        $colors = $GLOBALS["colors"];
        $names1 = $GLOBALS["names1"];
        $names2 = $GLOBALS["names2"];
        if($GLOBALS["number"] || $GLOBALS["number"]!=0){

            for ($i=0; $i < $GLOBALS["number"]; $i++) { 
                $varelse = [
                        "eyes" => rand(1,10),
                        "hands" =>  rand(1,10),
                        "age" => rand(10,100),
                        "color" => $colors[rand(0, sizeof($colors)-1)],
                        "name" => $names2[rand(0, sizeof($names2)-1)] . " " . $names1[rand(0, sizeof($names1)-1)]
                ];
                array_push($GLOBALS["varelser"], $varelse);
            }
        }
        else {
            $_POST['number'] = "0";
        }
    };
    createMonster();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Rymdvarelser</title>
</head>
<body>
    <form method = "post" action="index.php"> 
        <label for="number">Hur många varelser ska jag skapa</label><br> 
        <input type="number" name="number" id="number">  
        <button type="submit">Skapa</button>
    </form>
    <section>
            <?php 
                    foreach($varelser as $varelse) {
                        ?>
                            <div>
                                <h2><?= $varelse["name"] ?></h2>
                                <h4>Beskrivning</h4>
                                <ul>
                                    <p>Ålder: <?= $varelse["age"] ?> år</p>
                                    <p>Färg: <?= $varelse["color"] ?></p>
                                    <p>Antal ögon: <?= $varelse["eyes"] ?></p>
                                    <p>Antal händer: <?= $varelse["hands"] ?></p>
                                </ul>
                            </div>
                        <?php
                    }
            ?>
    </section>
</body>
</html>