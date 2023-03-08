<?php

require 'connect.php';

function getArchiveUnity()
{
    $db = new Database();
    $conn = $db->connect();

    $query = "SELECT p1.codice AS 'a_codice', p1.nome AS 'a_nome', p2.codice AS 'u_codice', p2.nome AS 'u_nome' 
                    FROM piano_di_studi p1
                    INNER JOIN formativa_didattica fd ON p1.codice = fd.formativa
                    INNER JOIN piano_di_studi p2 ON p2.codice = fd.didattica;
                ";

    return $conn->query($query);
}
