<!doctype html>
<html lang="en">
  <head>
    <title>Warehouse inventory</title>
    <meta charset="UTF-8">
    <meta name="author" content="Jacob Thompson">
    <link rel="stylesheet" type="text/css" href="tableformat.css" />
<script>
    function onClick(a, b, c){
        window.location.replace('update.php?a=' + a + '&r=' + b + '&h=' + c);
    }
    function refresh(a){
        window.location.replace('index.php?aisle=' + a);
    }
</script>
    </head>

  <body>
<?php
    include 'connect.php';
?>

    <div id='outer'>
        <?php
            if(!(array_key_exists('aisle', $_GET))){
                echo "<script>refresh(1)</script>";
            }
            $result = $GLOBALS['conn']->query('select * from aisle');
            $aisles = array();
            echo "<h1>Aisle <select onchange=\"refresh(this.value)\">";
            while($row = $result->fetch_assoc()){
                $aisle = array_pop($row);
                array_push($aisles, $aisle);
                if($aisle == $_GET['aisle']){
                    echo "<option selected>" . $aisle . "</option>";
                }else echo "<option>" . $aisle . "</option>";
            }
            echo "</select></h1>";
            $size = sizeof($aisles);
            for($i=0; $i < $size; $i++){
                $aisle = array_pop($aisles);
                if($aisle == $_GET['aisle']){
                    echo "<table id='" . $aisle . "'><thead><tr><th>Row</th><th>Height</th><th>Product</th><th>Customer</th><th>Quantity</th><th>Note</th></tr></thead>";
                    $rs2 = $GLOBALS['conn']->query('select * from shelf where aisle=' . $aisle);
                    while($r2 = $rs2->fetch_assoc()){
                        $r2 = array_reverse($r2);
                        $rr = array_pop($r2);
                        $hh = array_pop($r2);
                        echo "<tr><td>" . $rr . "</td><td>" . $GLOBALS['heightlist'][$hh] . "</td>";
                        array_pop($r2);
                        $item = array_pop($r2);
                        $q = $GLOBALS['conn']->query('select * from item where id=' . $item)->fetch_assoc();
                        if($item > 0){
                            $q = array_reverse($q);
                            array_pop($q);
                            echo "<td>";
                            echo array_pop($q);
                            echo "</td><td>";
                            echo array_pop($q);
                            echo "</td><td>";
                            echo array_pop($q);
                            echo "</td><td>";
                            echo array_pop($q);
                            echo "</td>";
                        }else echo "<td>Empty</td>";
                        echo "<td><button onclick=\"onClick(" . $aisle . ", " . $rr . ", " . $hh . ")\" >Update</button></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
        ?>
    </div>
    <button onclick="window.location.replace('filter.php?a=empty&b=name')">Filter Search</button>
  </body>
</html>
