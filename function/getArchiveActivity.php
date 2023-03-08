<?php

require 'connect.php';

function getArchiveActivity()
{
    $db = new Database();
    $conn = $db->connect();

    $query = "SELECT * FROM formativa_didattica fd
                    RIGHT JOIN piano_di_studi p ON p.codice = fd.didattica
                    WHERE fd.didattica IS NULL;
                ";

    return $conn->query($query);
}
