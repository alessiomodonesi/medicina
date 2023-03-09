<?php

require 'connect.php';

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['codice']) && isset($_POST['nome'])) {
        $query = sprintf(
            "INSERT INTO piano_di_studi (codice, nome)
            VALUES('%s', '%s')",
            $_POST['codice'],
            $_POST['nome']
        );

        $conn->query($query);
        header("Location: http://localhost/registro?page=1");
    }
}
