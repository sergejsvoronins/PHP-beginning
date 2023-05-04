<?php
    $multiArr = array(
        array("Emma", "28", "Stockholm"),
        array("Jonas", "35", "Göteborg"),
        array("Karin", "42", "Malmö")
    );
    function createHtmlTable ($array) {
        foreach ($array as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>" . $cell . "</td>";
            };
            echo "</tr>";
        };
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <section>
        <table>
            <tr>
                <th>Namn</th>
                <th>Ålder</th>
                <th>Stad</th>
            </tr>
            <?php
                createHtmlTable ($multiArr);
            ?>
        </table>
    </section>
</body>
</html>