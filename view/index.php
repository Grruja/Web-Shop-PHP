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
        <nav>
            <a href="index.php">Home</a>
            <?php if (!isset($_SESSION["username"])) : ?>
                <a href="../view/register.php">Sign Up</a>
            <?php else: ?>
                <a href="../model/logout.php">Logout</a>
                <a href="../view/cart_page.php">Cart</a>
            <?php endif; ?>
        </nav>
        <br>
        <br>

        <form method="GET">
            <input type="text" name="search" placeholder="Search" required>
            <button>Search</button>
        </form>

        <div>
            <h2>All Products</h2>
            <?php
                require_once "../model/search.php";
                if (!isset($_GET["search"]) || empty($_GET["search"])):
            ?>
                <?php
                    require_once "../model/all_products.php";
                    foreach ($products as $product):
                ?>
                    <a href="../view/product_page.php?id=<?= $product['id'] ?>">
                        <h5>
                            <?= $product["name"] ?>
                            <span> <?= $product["price"] ?> </span>
                        </h5>
                    </a>
                    <hr>
                <?php endforeach;  ?>
            <?php else: ?>
            <?php
                foreach ($search_products as $search_product):
                    ?>
                    <a href="../view/product_page.php?id=<?= $search_product['id'] ?>">
                        <h5>
                            <?= $search_product["name"] ?>
                            <span> <?= $search_product["price"] ?> </span>
                        </h5>
                    </a>
                    <hr>
                <?php endforeach;  ?>
            <?php endif; ?>
        </div>
    </body>

</html>