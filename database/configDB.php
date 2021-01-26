<?php

function connDB()
{

    $dbServer = '';
    $dbUser = 'buulugaexiflfy';
    $dbPass = 'c9232749191e959e79ce0a0fd1b806a7bb835354b6d391dfd54b596c2a750f92';
    $dbName = "d8h7sjoiqa1il";

    $conn = mysqli_connect($dbServer, $dbUser, $dbPass);

    if (!$conn) {
        die('Conn fail: ' . mysqli_error($dbServer, $dbUser, $dbPass));
    }

    mysqli_select_db($conn, $dbName);

    return $conn;
}
