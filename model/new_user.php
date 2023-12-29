<?php

    if (
        !isset($_POST["username"]) || empty($_POST["username"]) ||
        !isset($_POST["email"]) || empty($_POST["email"]) ||
        !isset($_POST["password"]) || empty($_POST["password"]) ||
        !isset($_POST["confirm_password"]) || empty($_POST["confirm_password"])
    ) {
        die("All fields are required");
    }

    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    if (strlen($username) < 2 || strlen($username) > 20) {
        die("Username must have at least 2 and maximum 20 characters");

    } else if (strlen($password) < 5) {
        die("Password must have at least 5 characters.");

    } else if ($confirm_password !== $password) {
        die("Passwords do not match");
    }

    $hash_password = password_hash($password, PASSWORD_BCRYPT);

    require_once "database.php";

    $check_username = $database->query("SELECT * FROM users WHERE username = '$username'");
    if ($check_username->num_rows > 0) {
        die("Username already exists");
    }

    $check_email = $database->query("SELECT * FROM users WHERE email = '$email'");
    if ($check_email->num_rows > 0) {
        die("There is already an user with this email");
    }

    $database->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hash_password')");

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION["username"] = $username;

    $result = $database->query("SELECT id FROM users WHERE username = '$username'");
    $user = $result->fetch_assoc();
    $_SESSION["id"] = $user["id"];

    header("Location: ../view/index.php");