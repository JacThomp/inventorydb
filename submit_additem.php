<?php
include 'connect.php';

echo $_POST['name'];
echo $_POST['customer'];
echo $_POST['quantity'];
echo $_POST['note'];

$obj = $GLOBALS['conn']->prepare("insert into item(name, customer, quantity, note) values(?, ?, ?, ?)");

$obj->bind_param('ssss', sanatize($_POST['name']), sanatize($_POST['customer']), sanatize($_POST['quantity']), sanatize($_POST['note']));

$obj->execute();

echo "<script>window.location.replace('update.php?a=" . $_POST['aisle'] . "&r=" . $_POST['row'] . "&h=" . $_POST['height'] . "')</script>";
?>
