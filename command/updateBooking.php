<?php
require_once 'database/configDB.php';


function updateBooking($id_user, $id, $name, $ic, $phone, $bookdate)
{

    $queryFlagUpdate = "SELECT id FROM appointments WHERE id_user = $id_user AND id = $id";
    $resultQueryFlag  = mysqli_query(connDB(), $queryFlagUpdate);

    $message = "";

    // ketika data ada dan sesuai eksekusi bro
    if ($resultQueryFlag->num_rows > 0) {

        $queryUpdateBooking = "UPDATE appointments SET name='$name', ic='$ic', phone='$phone', bookdate='$bookdate' WHERE id_user=$id_user AND id = $id";
        $resultQueryUpdate  = mysqli_query(connDB(), $queryUpdateBooking);

        $message = "Edit Successfully 😉";
    } else {
        $message = "Edit Failed, Please recheck! 😱";
    }

    return $message;
}
