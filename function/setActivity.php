<?php

require 'connect.php';

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['codice']) && isset($_POST['nome']) && isset($_POST['cfu'])) {
        $query = sprintf(
            "INSERT INTO piano_di_studi (codice, nome, cfu)
            VALUES('%s', '%s', '%s')",
            $_POST['codice'],
            $_POST['nome'],
            $_POST['cfu']
        );

        $conn->query($query);
    }
}
header("Location: http://localhost/registro?page=1");
