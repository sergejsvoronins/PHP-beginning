<?php 
require "connection.php";

$sql = "SELECT * FROM dogs";
$statement = $pdo->query($sql);
$dogs = $statement->fetchAll(PDO::FETCH_ASSOC);




class Dog {
    public $id = 0;
    private $name = "";
    private $color = "";
    private $age = 0;
    private $breed = "";
    private $weight = 0;
    private $height = 0;
    
    function __construct(int $id, string $name, string $color, int $age, string $breed, float $weight, float $height) {
        $this->id = $id;
        $this->name = $name;
        $this->color = $color;
        $this->age = $age;
        $this->breed = $breed;
        $this->weight = $weight;
        $this->height = $height;
    }

    function getName (): string {
        return $this->name;
    }
    function getId() {
        return $this->id;
    }
}

class DogHotell {
    private $dogs = [];

    function __construct($dogs) {
        $this->dogs = $dogs;
    }
    
    function getDogs() {
        return $this->dogs;
    }
    function addDog ($dog) {
        array_push($this->dogs, $dog);
    }
}

class RenderDog {
    
    public function renderDogNames(DogHotell $dogs): void {
        echo "<ul>";
            foreach($dogs->getDogs() as $dog){
                   echo "<li>{$dog->getName()}</li>";
            }
        echo "</ul>";
    }
    
}
$dogHotell = new DogHotell ([]);
$render = new RenderDog();
foreach($dogs as $dog) {
    $newDog = new Dog ($dog["id"], $dog["name"], $dog["color"], $dog["age"], $dog["breed"], $dog["weight"], $dog["height"]);
    $dogHotell->addDog($newDog);
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
        <section>
            <form action="form-handler.php" method = "post">
                <label for="name" >Namn</label><br>
                <input type="text" id= "name" name="name"><br>
                <label for="color">Färg</label><br>
                <input type="text" id="color" name="color"><br>
                <label for="age">Ålder</label><br>
                <input type="number" id="age" name="age"><br>
                <label for="breed">Kön</label><br>
                <input type="text" id="breed" name="breed"><br>
                <label for="height">Höjd(cm)</label><br>
                <input type="number" id="height" name="height"><br>
                <label for="weight">Vikt(kg)</label><br>
                <input type="number" id="weight" name="weight"><br>
                <button type="submit">Skapa</button>
            </form>
        </section>
        <section class="dogsCont">
            <div>
                <?php
                    $render->renderDogNames($dogHotell);
                ?>
            </div>
        </section>
    </main>

    <?php 


    ?>
</body>
</html>