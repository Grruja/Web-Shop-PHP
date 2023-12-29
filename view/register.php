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
        <form action="../model/new_user.php" method="POST">
            <input type="text" name="username" placeholder="Username" required> <br><br>
            <input type="email" name="email" placeholder="Email" required> <br><br>
            <input type="password" name="password" placeholder="Password" required> <br><br>
            <input type="password" name="confirm_password" placeholder="Confirm password" required> <br><br>
            <button>Sign Up</button>
        </form> <br>

        <div>Already have an account? <a href="login.php">log in</a> </div>
    </body>

</html>