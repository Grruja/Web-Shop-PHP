<?php

    if ( !isset( $_POST["username"] ) || empty( trim( $_POST["username"] ) ) )
    {
        die("Username is required.");
    }
    else if ( strlen( trim( $_POST["username"] ) ) < 3 || strlen( trim( $_POST["username"] ) ) > 32 )
    {
        die("Username needs to have minimum 4 characters and maximum 32.");
    }

    if ( !isset( $_POST["email"] ) )
    {
        die("Email is required.");
    }

    if ( !isset( $_POST["password"] ) || empty( trim( $_POST["password"] ) ) )
    {
        die("Password is required.");
    }
    else if ( strlen( trim( $_POST["password"] ) ) < 5 || strlen( trim( $_POST["password"] ) ) > 64 )
    {
        die("Password needs to have minimum 7 characters and maximum 64.");
    }

    if ( !isset( $_POST["conf_password"] ) || empty( trim( $_POST["password"] ) ) )
    {
        die("Please confirm your password.");
    }
    else if ( $_POST["password"] != $_POST["conf_password"] )
    {
        die("Passwords do not match.");
    }

    $username = trim( $_POST["username"] );
    $email = trim( $_POST["email"] );
    $password = password_hash( $_POST["password"], PASSWORD_BCRYPT );

    require_once "database.php";
    $username_exist = $database->query( " SELECT * FROM users WHERE username = '$username' " );
    $email_exist = $database->query( " SELECT * FROM users WHERE email = '$email' " );

    if ( $username_exist->num_rows == 1 )
    {
        die("{$username} is already taken!");
    }
    else if ( $email_exist->num_rows == 1 )
    {
        die("There is already a user with this email.");
    }

    $database->query( " INSERT INTO users ( username, email, password ) VALUES ( '$username', '$email', '$password' ) " );