<?php
require_once(__DIR__ . '/../database/configDB.php');


function delBooking($id_user, $id)
{
    $queryFlagDelete = "SELECT id FROM appointments WHERE id_user = $id_user AND id=$id";
    $resultQueryFlag  = mysqli_query(connDB(), $queryFlagDelete);

    $message = "";

    // jika data ada maka dihapus sesuai benar id nya
    if ($resultQueryFlag->num_rows > 0) {

        $queryDeleteBooking = "DELETE FROM appointments WHERE id_user = $id_user AND id=$id";
        $resultQueryDelete  = mysqli_query(connDB(), $queryDeleteBooking);

        $message = "Appointment Deleted 😉";
    } else {
        $message = "Delete Failed! 😱";
    }

    return $message;
}
