<?php

    require_once "database.php";
    $result = $database->query("SELECT * FROM products ORDER BY id DESC");

    if ($result->num_rows > 0) {
        $products = $result->fetch_all(MYSQLI_ASSOC);

    } else {
        die("No products found");
    }