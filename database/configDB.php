<?php

function connDB()
{

    $dbServer = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = "fyp";

    $conn = mysqli_connect($dbServer, $dbUser, $dbPass);

    if (!$conn) {
        die('Conn fail: ' . mysqli_error($dbServer, $dbUser, $dbPass));
    }

    mysqli_select_db($conn, $dbName);

    return $conn;
}
