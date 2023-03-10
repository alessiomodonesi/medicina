<?php

require 'connect.php';

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['codice']) && isset($_POST['nome']) && isset($_POST['cfu'])) {
        $query = sprintf(
            "UPDATE piano_di_studi
            SET nome = '%s', cfu = %d
            WHERE codice = '%s'",
            $_POST['nome'],
            $_POST['cfu'],
            $_POST['codice']
        );

        $conn->query($query);
    }
}
header("Location: http://localhost/registro?page=1");
