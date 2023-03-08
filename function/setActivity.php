<?php

require 'connect.php';

function setActivity($data)
{
    $db = new Database();
    $conn = $db->connect();

    $query = "INSERT INTO piano_di_studi (codice, nome)
                    VALUES('$data->codice', '$data->nome');
                ";

    return $conn->query($query);
}
