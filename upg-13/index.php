<?php 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $about = $_POST['about'];

    // FILTER_SANITIZE_STRING
    $sanitized_name = filter_var($name, FILTER_SANITIZE_STRING);
    $sanitized_about = filter_var($about, FILTER_SANITIZE_STRING);
    // FILTER_SANITIZE_EMAIL
    $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
    //FILTER_SANITIZE_NUMBER_INT
    $sanitized_age = filter_var($age, FILTER_SANITIZE_NUMBER_INT);

    // FILTER_VALIDATE_EMAIL
    $validated_email = filter_var($sanitized_email, FILTER_VALIDATE_EMAIL);
    //FILTER_VALIDATE_INT
    $validated_age = filter_var($age, FILTER_VALIDATE_INT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post-demo</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Name: </label><br>
        <input type="text" name="name" id="name"><br>
        <label for="name">E-mail: </label><br>
        <input type="text" name="email" id="email"><br>
        <label for="age">Ålder: </label><br>
        <input type="number" name="age" id="age"><br>
        <label for="about">Om dig: </label><br>
        <textarea name="about" id="about"></textarea><br>
        <button>Submit</button>
    </form>
    <?php
        if($validated_email && $validated_age && $name && $email && $age && $about){
            ?>
            <p>Ditt namn är: <?= $sanitized_name ?></p>
            <p>Din epost är: <?= $validated_email ?></p>
            <p>Din ålder är: <?= $validated_age ?></p>
            <p>Om dig: <?= $sanitized_about ?></p>
            <?php
        }
        else {
            ?>
            <h4>input is not correct</h4>
        <?php
        }
        echo $age;
        echo $about;
    ?>
</body>
</html>
