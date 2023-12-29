<?php

    if (
        !isset($_POST["name"]) || empty($_POST["name"]) ||
        !isset($_POST["description"]) ||
        !isset($_POST["price"]) || empty($_POST["price"]) ||
        !isset($_POST["quantity"]) || empty($_POST["quantity"]) ||
        !isset($_POST["image"]) || empty($_POST["image"])
    ) {
        die("All fields are required");
    }

    $name = trim($_POST["name"]);
    $description = trim($_POST["description"]);
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $image = trim($_POST["image"]);

    if (strlen($name) < 2) {
        die("Name must have at least 2 characters");

    } else if (!$description) {
        $description = null;

    } else if (strlen($description) < 10 || strlen($description) > 256) {
        die("Description must have at least 15 and maximum 256 characters");

    } else if ($price < 0) {
        die("Invalid price");

    } else if ($quantity <= 0) {
        die("Invalid quantity");

    } else if (strlen($image) <= 4) {
        die("Invalid image");
    }

    require_once "database.php";
    $database->query("INSERT INTO products (name, description, price, quantity, image) VALUES ('$name', '$description', $price, $quantity, '$image')");