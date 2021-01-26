<?php
require_once 'database/configDB.php';


function bookApt($id_user, $name, $ic, $phone, $bookdate)
{

    $querybookApt = "INSERT INTO appointments (name, ic, phone, bookdate, id_user) VALUES ('$name', '$ic', '$phone', '$bookdate', '$id_user')";
    $resultQueryInsert  = mysqli_query(connDB(), $querybookApt);

    if ($resultQueryInsert) {
        $message = "Booked successfully 😉";
    } else {
        $message = "Booking fail, try again 😱";
    }

    return $message;
}
