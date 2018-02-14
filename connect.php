<?php
/*Error Checking*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//echo "<div hidden>";

$conn='';

$heightlist = array('Ground', 'A', 'B', 'C');

//Scopes things so only the database is accesible outside of this file.
function connect(){
    $data = array('inventory', 'warehouse', 'root');
    $GLOBALS['conn'] = new mysqli('localhost', $data[1], $data[2], $data[0]);
}

connect();

if($conn->connect_error){
    echo $GLOBALS['conn']->connect_error;
    die("Connection Failed: " . $GLOBALS['conn']->connect_error);
}

function sanatize($data){
    return htmlspecialchars(stripslashes(trim($data)));
}

//echo "</div>"

?>
