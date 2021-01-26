<?php
require_once 'database/configDB.php';

function viewBookingUser($id_user)
{

    $queryviewBookingUser = "SELECT id, name, ic, phone, bookdate FROM appointments WHERE id_user = $id_user";
    $resultQueryView      = mysqli_query(connDB(), $queryviewBookingUser);

    $message = "";

    if ($resultQueryView->num_rows > 0) {
        while ($viewDataBooking = mysqli_fetch_assoc($resultQueryView)) {
            $resultBooking = (object) $viewDataBooking;

            $message .= "Booking ID   : " . $resultBooking->id . PHP_EOL;
            $message .= "Name   :" . $resultBooking->name . PHP_EOL;
            $message .= "IC   : " . $resultBooking->ic . PHP_EOL;
            $message .= "Contacts   : " . $resultBooking->phone . PHP_EOL;
            $message .= "Book Date   : " . $resultBooking->bookdate . PHP_EOL;
            $message .= "\n";
        }
    } else {
        $message = "EMPTY 🙄";
    }

    return $message;
}
