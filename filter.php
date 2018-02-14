<!doctype html>
<html lang="en">
  <head>
    <title>Warehouse inventory</title>
    <meta charset="UTF-8">
    <meta name="author" content="Jacob Thompson">
    <link rel="stylesheet" type="text/css" href="filterformat.css" />
<script>
    function refresh(str, opt){
        window.location.replace('filter.php?a=' + str + '&b=' + opt);
    }
</script>
    </head>

  <body>
<?php
    include 'connect.php';
?>

    <div id='outer'>
        <?php
            $filter = $_GET['a'];
            $opt = sanatize($_GET['b']);
            $result = $GLOBALS['conn']->prepare('select * from shelf join item on shelf.item=item.id where ' . $opt . ' like ?');
            $filter = "%" . sanatize($filter) . "%";
            $result->bind_param('s', $filter);
            $result->execute();
            echo "<table><tr><th>Aisle</th><th>Row</th><th>Height</th><th>Product</th><th>Customer</th><th>Quantity</th><th>Note</th></tr>";
            $result = $result->get_result();
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                $row = array_reverse($row);
                $r = array_pop($row);
                $h = array_pop($row);
                $a = array_pop($row);
                $i = array_pop($row);
                echo "<td>" . $a . "</td><td>" . $r . "</td><td>" . $GLOBALS['heightlist'][$h] . "</td><td>";
                $q = $GLOBALS['conn']->query('select * from item where id=' . $i)->fetch_assoc();
                if($i > 0){
                    $q = array_reverse($q);
                    array_pop($q);
                    echo array_pop($q);
                    echo "</td><td>";
                    echo array_pop($q);
                    echo "</td><td>";
                    echo array_pop($q);
                    echo "</td><td>";
                    echo array_pop($q);
                    echo "</td>";
                }else echo "<td>Empty</td>";
            }
            echo "</table>";
        ?>
    </div>
    <input type="text" id="filter"><button onclick="refresh(document.getElementById('filter').value, getElementById('opt').value)">Filter</button>
    <select id="opt">
        <option value="note">Note</option>
        <option value="item.name">Product</option>
        <option value="customer">Customer</option>
        <option value="aisle">Aisle</option>
    </select>
    <button onclick="window.location.replace('index.php?aisle=1')">Return</button>

  </body>
</html>
