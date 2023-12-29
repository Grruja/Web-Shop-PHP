<?php

    if (!isset($_GET["search"]) || empty($_GET["search"])) {
        $search = "";

    } else {
        $search = $_GET["search"];

        require_once "database.php";
        $result = $database->query("SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%'");

        if ($result->num_rows > 0) {
            $search_products = $result->fetch_all(MYSQLI_ASSOC);

        } else {
            die("No search result");
        }
    }