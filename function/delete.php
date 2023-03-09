<?php

require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['codice'])) {
        $db = new Database();
        $conn = $db->connect();

        $query = sprintf(
            "DELETE FROM piano_di_studi WHERE codice = '%s'",
            $_POST['codice']
        );

        $conn->query($query);
        header("Location: http://localhost/registro?page=1");
    }
}
