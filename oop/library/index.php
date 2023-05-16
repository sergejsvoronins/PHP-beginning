<?php
if(isset($_GET["id"])){
    $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
}
else {
    $id = 0;
}
$pdo = require "connection.php";
$sql_books = 
    "SELECT books.id as books_id, books.name, books.year, books.author_id, authors.firstName, authors.lastName FROM books 
    JOIN authors ON authors.id = books.author_id;";
$sql_authors = "SELECT * FROM authors";
$statement_books = $pdo->prepare($sql_books);
$statement_authors = $pdo->prepare($sql_authors);
$statement_books->execute([]);
$statement_authors->execute([]);
$books = $statement_books->fetchAll(PDO::FETCH_ASSOC);
$authors = $statement_authors->fetchAll(PDO::FETCH_ASSOC);
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
    <section>
        <form action="book-form-handler.php" method="post">
            <label for="name">Namn</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="year">År</label><br>
            <input type="number" id="year" name="year"><br>
            <label for="author">Författare</label><br>
            <select name="author_id" id="author">
                <?php
                    foreach($authors as $a) {
                        ?>
                        <option value="<?=$a["id"]?>"><?=$a["firstName"] . " " . $a["lastName"]?></option>
                        <?php
                    }
                ?>
                <!-- <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="mercedes">Mercedes</option>
                <option value="audi">Audi</option> -->

            </select>
            <button>Skapa</button>
        </form>
    </section>
    <section>
        <ul>
            <?php 
                foreach($books as $book){
                    ?>
                    <a href="?id=<?=$book["books_id"]?>">
                        <li><?=$book["name"]?></li>
                    </a>
                    <?php
                }
            ?>
        </ul>
    </section>
    <section>
        <?php
            if($id !== 0) {
                foreach ($books as $book) {
                    if($book["books_id"] == (int)$id) {
                        ?>
                        <h2>Titel: <?=$book["name"]?></h4>
                        <h4>Författare: <?=$book["firstName"] ." " . $book["lastName"]?></h4>
                        <h4>Publicerad: <?=$book["year"]?></h4>
                        <?php
                    }
                }
            }
            else {
                echo "inget valt";
            }
        ?>
    </section>
</body>
</html>