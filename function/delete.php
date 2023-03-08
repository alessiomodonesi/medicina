<?php

require 'connect.php';

function delete()
{
    $db = new Database();
    $conn = $db->connect();

    $codice = $_GET['codice'];
    $query = "DELETE FROM piano_di_studi p WHERE p.codice=$codice";

    return $conn->query($query);
}
