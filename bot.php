<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

require_once '../vendor/autoload.php';
require_once '../database/configDB.php';

$configs = [
    "telegram" => [
        "token" => file_get_contents("private/token.txt")
    ]
];

DriverManager::loadDriver(TelegramDriver::class);

$botman = BotManFactory::create($configs);

// Command no @ to bot
$botman->hears("/start", function (BotMan $bot) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $lastname = $user->getLastName();
    $id_user = $user->getId();

    $bot->reply("Greetings! $firstname $lastname (ID:$id_user).\nI am Jamil, I can help you setup the your appointment.\n\nPlease click /book_appointment to book!\n/help for more");
});

$botman->hears("/help", function (Botman $bot) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();

    include "command/requestChat.php";

    $bot->reply("/book_appointment to set your appointment");
    $bot->reply("/viewBooking to view your appointment");
    $bot->reply("/edit_booking_appointment to edit your appointment");
    $bot->reply("/cancel_booking_appointment to remove your appointment that has been set up");
});

$botman->hears("/book_appointment", function (BotMan $bot) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();

    include "command/requestChat.php";
    $bot->reply("Format Booking:\n\n/book [Name]_[IC]_[Phone]_[Appointment Date]\n\n*Without brackets []");
});

$botman->hears("/book {name}_{ic}_{phone}_{bookdate}", function (Botman $bot, $name, $ic, $phone, $bookdate) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();

    $name = $name;
    $ic = $ic;
    $phone = $phone;
    $bookdate = $bookdate;

    include "command/requestChat.php";
    include "command/bookAppointment.php";

    $message = bookApt($id_user, $name, $ic, $phone, $bookdate);
    $bot->reply($message);
});

$botman->hears("/viewBooking", function (Botman $bot) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();

    include "command/requestChat.php";
    include "command/viewBooking.php";

    $message = viewBookingUser($id_user);
    $bot->reply($message);
});

$botman->hears("/edit_booking_appointment", function (Botman $bot) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();

    include "command/requestChat.php";
    $bot->reply("Format Edit Booking:\n\n/edit_booking [Your appointment ID]_[New Name As In IC]_[New IC Number]_[New Phone Number]_[New Date YYYY-MM-DD]\n\n*Without Brackets []\nRefer Appointment ID at /viewBooking");
});

$botman->hears("/edit_booking {id}_{name}_{ic}_{phone}_{bookdate}", function (Botman $bot, $id, $name, $ic, $phone, $bookdate) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();

    include "command/requestChat.php";

    $id = $id;
    $name = $name;
    $ic = $ic;
    $phone = $phone;
    $bookdate = $bookdate;

    include "command/updateBooking.php";

    $message = updateBooking($id_user, $id, $name, $ic, $phone, $bookdate);
    $bot->reply($message);
});

$botman->hears("/cancel_booking_appointment", function (Botman $bot) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();

    include "command/requestChat.php";

    $bot->reply("Format Delete Booking:\n\n/delete_booking [Enter Your Appointment ID]\n\n*Tanpa Tanda Kurung []\nRefer Appointment ID at /viewBooking");
});

$botman->hears("/delete_booking {id}", function (Botman $bot, $id) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();

    include "command/requestChat.php";

    $id = $id;

    include "command/delBooking.php";

    $message = delBooking($id_user, $id);
    $bot->reply($message);
});
// command not found
$botman->fallback(function (BotMan $bot) {
    $message = $bot->getMessage()->getText();
    $bot->reply("Sorry, This command '$message' not found 😐");
});

$botman->listen();
