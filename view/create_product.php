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
        <h1>Create Listing</h1>
        <form action="../model/add_product.php" method="POST">
            <input type="text" name="name" placeholder="Product name" required> <br><br>
            <textarea name="description" placeholder="Description"></textarea> <br><br>
            <input type="number" name="price" placeholder="Price" required> <br><br>
            <input type="number" name="quantity" placeholder="Quantity" required> <br><br>
            <input type="text" name="image" placeholder="Image" required> <br><br>
            <button>Create</button>
        </form>
    </body>

</html>