<?php

namespace ChatTele;

require_once 'database/configDB.php';

date_default_timezone_set('Asia/Kuala_Lumpur');

function checkDataUser($id_user)
{
    $querySelectData    = "SELECT * FROM parents WHERE id_user = $id_user LIMIT 1";
    $resultQuery        = mysqli_query(connDB(), $querySelectData);

    return (object) mysqli_fetch_assoc($resultQuery);
}

function getDataUser($user)
{
    $data   = [
        "id_user"           =>     $user->getId(),
        "name"              =>     $user->getFirstName()
    ];

    return (object) $data;
}

function insertNewUser($dataUser)
{
    $queryInsertNewUser    = "INSERT INTO parents (id_user, name)
                            VALUES ($dataUser->id_user, '$dataUser->name')";

    mysqli_query(connDB(), $queryInsertNewUser);
}
