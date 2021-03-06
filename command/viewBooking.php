<?php
require_once(__DIR__ . '/../database/configDB.php');

function viewBookingUser($id_user)
{

    $queryviewBookingUser = "SELECT id, name, ic, phone, bookdate FROM appointments WHERE id_user = $id_user";
    $resultQueryView      = pg_query(connDB(), $queryviewBookingUser);
    $rows = pg_num_rows($resultQueryView);

    $message = "";

    if ($rows > 0) {
        while ($viewDataBooking = pg_fetch_assoc($resultQueryView)) {
            $resultBooking = (object) $viewDataBooking;

            $message .= "Booking ID   : " . $resultBooking->id . PHP_EOL;
            $message .= "Name   : " . $resultBooking->name . PHP_EOL;
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
