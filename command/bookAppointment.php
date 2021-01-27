<?php
require_once(__DIR__ . '/../database/configDB.php');


function bookApt($id_user, $name, $ic, $phone, $bookdate)
{

    $querybookApt = "INSERT INTO appointments (id, name, ic, phone, bookdate, id_user) VALUES (NULL, '$name', '$ic', '$phone', '$bookdate', '$id_user')";
    $resultQueryInsert  = pg_query(connDB(), $querybookApt);

    if ($resultQueryInsert) {
        $message = "Booked successfully 😉";
    } else {
        $message = "Booking fail, try again 😱";
    }

    return $message;
}
