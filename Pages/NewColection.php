<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $id = $_GET['id'];
    include_once("../database.php");
    $Images = getElementById($id);
    foreach ($Images as $key => $Image) {
    echo("<p>". $Image["Name"]."</php>");
    }
    echo($id);
    //print($Image[0]);
    ?>
</body>
</html>