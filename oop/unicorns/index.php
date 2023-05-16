<?php 
$allColors = ["red", "green", "blue", "yellow", "pink", "gray", "purple", "orange", "brown", "black"];
$chosenColor="";
$input = $_POST["number"];
if(isset($_GET["color"])){

    $chosenColor = $_GET["color"];
}
if (isset($_POST["number"])) {
    $input = $_POST["number"];
}
class Unicorn {
    private $name = "";
    public $color = "";
    function __construct($name, $color){
        $this->name = $name;
        $this->color = $color;
    }
}

function createUnicornsList (int $number) {
    $allUnicorns = [];
    for ($i=0; $i < $number ; $i++) { 
        global $allColors;
        $index = mt_rand(0, sizeof($allColors)-1);
        $randColor = $allColors[$index];
        $newUnicorn = new Unicorn ("Unicorn", $randColor );
        array_push($allUnicorns, $newUnicorn);
    }
    return $allUnicorns;
}

class RenderAllApp {
    function showAllColors ($allColors) {
            ?>
                <section>
                    <ul>
                        <?php
                            foreach($allColors as $color) {
                                ?>
                                <li>
                                    <a href="index.php?color=<?=$color?>"><?= $color ?></a>
                                </li>
                                <?php
                            }
                            ?>
                    </ul>
                </section>
            <?php
    }
    function showUnicorns ($color, $array) {
        $amount = 0;
        foreach($array as $unicorn) {
            if($unicorn->color == $color){
                $amount++;
            }
        }
        ?>
        <section>
            <p>Color: <?= $color ?></p>
            <p>Antal enhörningar: <?= $amount?></p>
        </section>
        <?php
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <main>
            <form action="index.php" method = "post">
                <label for="number">Hur mycket enhörningar ska jag skapa?</label>
                <br>
                <input type="number" name="number" id="number">
                <button type="submit">Skapa</button>
            </form>
            <div>
                <?php 
                $renderar = New RenderAllApp();
                $renderar->showAllColors($allColors);
                $renderar->showUnicorns($chosenColor, createUnicornsList(100));
                echo $input;
                ?>
            </div>
        </main>        
</body>
</html>