<?php

    if (
        !isset($_POST["username"]) || empty($_POST["username"]) ||
        !isset($_POST["password"]) || empty($_POST["password"])
    ) {
        die("All fields are required");
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "database.php";

    $user = $database->query("SELECT * FROM users WHERE username = '$username'");
    if ($user->num_rows  > 0) {
        $data_user = $user->fetch_assoc();
        $verify_password = password_verify($password, $data_user["password"]);
        if (!$verify_password) {
            die("Wrong password");
        }

    } else {
        die("Invalid username");
    }

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION["username"] = $username;
    $_SESSION["id"] = $data_user["id"];
    header("Location: ../view/index.php");