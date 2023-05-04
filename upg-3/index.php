<?php

$recipes = array(
    ["title"=>"Broccolli soup", "ingredients" =>['ing1', 'ing2', 'ing3'], "description" =>"Lorem ipsum"],
    ["title"=>"Broccolli soup", "ingredients" =>['ing1', 'ing2', 'ing3'], "description" =>"Lorem ipsum"],
    ["title"=>"Broccolli soup", "ingredients" =>['ing1', 'ing2', 'ing3'], "description" =>"Lorem ipsum"],
);

function printRecipes ($somelist) {
    foreach($somelist as $rec) {
        echo "<div>";
        echo "<h1>" . $rec["title"] . "</h1>";
        echo "<h2>Ingredienser</h2>";
        echo "<ol>";
        foreach($rec["ingredients"] as $ing) {
            echo "<li>" . $ing . "</li>";
        }
        echo "</ol>";
        echo "<h3>Gör så här:</h3>";
        echo "<p>" .$rec["description"] . "</p>";
        echo "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uppgift-2</title>
</head>
<body>
    <?php 
        printRecipes($recipes);
    ?>
</body>
</html>