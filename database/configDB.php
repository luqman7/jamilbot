<?php

function connDB()
{

    $url         = "DATABASE_URL = postgres://buulugaexiflfy:c9232749191e959e79ce0a0fd1b806a7bb835354b6d391dfd54b596c2a750f92@ec2-54-235-158-17.compute-1.amazonaws.com:5432/d8h7sjoiqa1il";
    $host        = "DB_HOST = ec2-54-235-158-17.compute-1.amazonaws.com";
    $port        = "DB_PORT = 5432";
    $dbname      = "DB_DATABASE = d8h7sjoiqa1il";
    $user        = "DB_USERNAME = buulugaexiflfy";
    $password    = "DB_PASSWORD = c9232749191e959e79ce0a0fd1b806a7bb835354b6d391dfd54b596c2a750f92";
    //$credentials = "user = buulugaexiflfy password=c9232749191e959e79ce0a0fd1b806a7bb835354b6d391dfd54b596c2a750f92";

    $db = pg_connect("$url $host $port $dbname $user $password");
    if (!$db) {
        echo "Error : Unable to open database\n";
    } else {
        echo "Opened database successfully\n";

        return $db;
    }
}
