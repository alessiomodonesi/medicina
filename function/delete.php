<?php

require 'connect.php';

function delete()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['codice'])) {
            $db = new Database();
            $conn = $db->connect();

            $query = sprintf(
                "DELETE FROM piano_di_studi WHERE codice = '%s'",
                $_GET['codice']
            );

            $conn->query($query);
            header("Location: http://localhost/registro?page=1");
        }
    }
}

delete();
