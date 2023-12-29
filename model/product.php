<?php

    if (!isset($_GET["id"]) || empty($_GET["id"])) {
        die("Missing product ID");
    }

    $id = $_GET["id"];

    require_once "database.php";
    $result = $database->query("SELECT * FROM products WHERE id = $id");

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

    } else {
        die("Page not found");
    }