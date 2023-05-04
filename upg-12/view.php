<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries</title>
</head>
<body>
    <main>
        <section>
            <p>Countries:</p>
            <ul>
                <?php 
                    foreach($countries as $countrie) {
                        echo "<li>
                                <a href='index.php?id={$countrie["id"]}'>
                                    {$countrie['name']}
                                </a>
                            </li>";
                    }
                ?>
            </ul>
        </section>
        <section>
            <p>Countrie: <?=$singleCountrie["name"]?></p>
            <p>Capital: <?=$singleCountrie["capital"]?></p>
            <p>Continent: <?=$singleCountrie["continent"]?></p>
            <p>Democracy: 
                <?php 
                    if($singleCountrie["isDemocracy"]){
                        ?>
                        <input type="checkbox" checked = "true">
                        <?php
                    }
                    else {
                        ?>
                        <span>X</span>
                        <?php
                    }
                ?>
            </p>
            <ol>
                <?php 
                    foreach($singleCountrie["isFamous"] as $famous) {
                        echo "<li>$famous</li>";
                    }
                ?>
            </ol>
        </section>
    </main>
</body>
</html>