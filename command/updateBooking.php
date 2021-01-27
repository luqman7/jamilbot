<?php
require_once '/database/configDB.php';


function updateBooking($id_user, $id, $name, $ic, $phone, $bookdate)
{

    $queryFlagUpdate = "SELECT id FROM appointments WHERE id_user = $id_user AND id = $id";
    $resultQueryFlag  = pg_query(connDB(), $queryFlagUpdate);
    $rows = pg_num_rows($resultQueryFlag);

    $message = "";

    // ketika data ada dan sesuai eksekusi bro
    if ($rows > 0) {

        $queryUpdateBooking = "UPDATE appointments SET name='$name', ic='$ic', phone='$phone', bookdate='$bookdate' WHERE id_user=$id_user AND id = $id";
        $resultQueryUpdate  = mysqli_query(connDB(), $queryUpdateBooking);

        $message = "Edit Successfully 😉";
    } else {
        $message = "Edit Failed, Please recheck! 😱";
    }

    return $message;
}
