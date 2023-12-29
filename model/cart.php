<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (
        !isset($_POST["id_product"]) || empty($_POST["id_product"]) ||
        !isset($_POST["quantity"]) || empty($_POST["quantity"])
    ) {
        die("All fields are required");
    }

    $id_product = $_POST["id_product"];
    $id_user = $_SESSION["id"];
    $quantity = $_POST["quantity"];

    require_once "database.php";
    $id_product = $database->real_escape_string($id_product);
    $id_user = $database->real_escape_string($id_user);
    $quantity = $database->real_escape_string($quantity);

    $result = $database->query("SELECT price FROM products WHERE id = $id_product");

    $product = $result->fetch_assoc();
    $total = $quantity * $product["price"];
    $total = $database->real_escape_string($total);

    $database->query("INSERT INTO orders (id_product, id_user, price, quantity) VALUES ($id_product, $id_user, $total, $quantity)");