<!doctype html>
<html lang="en">
    <head>
        <title>Update Inventory</title>
        <meta charset="UTF-8">
        <meta name="author" content="Jacob Thompson">
        <link rel="stylesheet" type="text/css" href="updateformat.css" />
    <script>
        function addItem(a, r, h){
            window.location.replace('addproduct.php?a=' + a + '&r=' + r + '&h=' + h);
        }
    </script>
    </head>
    <body>
<?php
    include 'connect.php';
?>

    <form id="form" action="submit_update.php" method="post">
    Product: <select name="product"><?php
            $items = $GLOBALS['conn']->query("select * from item order by id desc");
            while($item = $items->fetch_assoc()){
                if($item['id'] == 1){
                    echo "<option value=\"" . $item['id'] . "\" selected>" . $item['name'] . " Qt:" . $item['quantity'] . " Note: " . $item['note'] . "</option>";
                }else echo "<option value=\"" . $item['id'] . "\">" . $item['name'] . " Qt:" . $item['quantity'] . " Note: " . $item['note'] . "</option>";
            }?></select><br>
            <input type="hidden" name="aisle" value="<?php echo $_GET['a'];?>">
            <input type="hidden" name="row" value="<?php echo $_GET['r'];?>">
            <input type="hidden" name="height" value="<?php echo $_GET['h'];?>">
        <input type="submit">
    </form>
    <br>
    <?php echo "<button onclick=\"addItem(" . $_GET['a'] . ", " . $_GET['r'] . ", " . $_GET['h'] . ")\" >Add Product</button>"; ?>

    <button onclick="window.location.replace('index.php?aisle=1')">Return</button>
    </body>
</html>
