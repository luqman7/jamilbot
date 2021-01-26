<?php

function connDB()
{

    $host        = "host = ec2-54-235-158-17.compute-1.amazonaws.com";
    $port        = "port = 5432";
    $dbname      = "dbname = d8h7sjoiqa1il";
    $credentials = "user = buulugaexiflfy password=c9232749191e959e79ce0a0fd1b806a7bb835354b6d391dfd54b596c2a750f92";

    $db = pg_connect("$host $port $dbname $credentials");
    if (!$db) {
        echo "Error : Unable to open database\n";
    } else {
        echo "Opened database successfully\n";

        return $db;
    }
}
