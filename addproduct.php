<!doctype html>
<html lang="en">
    <head>
        <title>Add Product</title>
        <meta charset="UTF-8">
        <meta name="author" content="Jacob Thompson">
        <link rel="stylesheet" type="text/css" href="updateformat.css" />
    </head>
    <body>
<?php
    include 'connect.php';
?>

    <form id="form" action="submit_additem.php" method="post">
        Item Name: <input type="text" name="name" required><br>
        Customer Name: <input type="text" name="customer"><br>
        Quantity: <input type="number" name="quantity"><br>
        Notes: <input type="text" name="note"><br>
        <input type="hidden" name="aisle" value="<?php echo $_GET['a'];?>">
        <input type="hidden" name="row" value="<?php echo $_GET['r'];?>">
        <input type="hidden" name="height" value="<?php echo $_GET['h'];?>">
        <input type="submit">
    </form>

    <button onclick="window.location.replace('index.php?aisle=1')">Return</button>
    </body>
</html>
