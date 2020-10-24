<?php

    //  deprecated, the whole content is moved to user.php

    session_start();

    $server = 'localhost';
    $username = 'root';
    $password = 'password';
    $db = 'cmpe272';

    $conn = new mysqli($server, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $GLOBALS['conn'] = $conn;
    $_SESSION['conn'] = $conn;

?>
