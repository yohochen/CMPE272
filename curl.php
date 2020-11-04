<?php

$server = 'localhost';
$username = 'root';
$password = 'password';
$db = 'cmpe272';

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$GLOBALS['conn'] = $conn;

function fetchAll() {
    $conn = $GLOBALS['conn'];
    $query = "select * from user";
    $resultArray = array();
    $result =  $conn->query($query);
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $resultArray[] = $row;
    }
    echo json_encode($resultArray);
    $conn -> close();
}

fetchAll();

?>
