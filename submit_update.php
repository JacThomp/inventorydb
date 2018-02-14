<?php
    include 'connect.php';

    $query = "update shelf set item=? where height=? and number=? and aisle=?";
    $obj = $GLOBALS['conn']->prepare( $query );
    $obj->bind_param('ssss', sanatize($_POST['product']), sanatize($_POST['height']), sanatize($_POST['row']), sanatize($_POST['aisle']));
    $obj->execute();

    echo "<script>window.location.replace('index.php')</script>";
?>
