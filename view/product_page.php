<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
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
        <?php require_once "../model/product.php"; ?>
        <p> <?= $product["image"] ?> </p>
        <h2> <?= $product["name"] ?> </h2>
        <p> <?= $product["description"] ?> </p>
        <h5> <?= $product["price"] ?> </h5>
        <p> <?= $product["quantity"] ?> </p>

        <?php if (!isset($_SESSION["username"])) : ?>
            <a href="../view/register.php">Sign Up</a>
        <?php else: ?>
            <form method="POST" action="../model/cart.php">
                <input type="number" name="quantity" placeholder="pcs">
                <input type="hidden" name="id_product" value="<?= $product["id"] ?>">
                <button>Add to cart</button>
            </form>
        <?php endif; ?>
    </body>

</html>
