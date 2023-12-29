<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $id_user = $_SESSION["id"];
    require_once "../model/database.php";

    $result = $database->query("SELECT orders.quantity, orders.price, products.name
    FROM orders 
    INNER JOIN products ON products.id = orders.id_product
    WHERE orders.id_user = $id_user");
    if ($result->num_rows > 0) {
        $orders = $result->fetch_all(MYSQLI_ASSOC);

    } else {
        $orders = [];
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <h1>Your Orders:</h1>
        <ul>
            <?php foreach ($orders as $order): ?>
                <li> <?= $order["name"] ?> x <?= $order["quantity"] ?> ..... $<?= $order["price"] ?> </li>
            <?php endforeach; ?>
        </ul>
    </body>

</html>
