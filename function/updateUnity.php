<?php

require 'connect.php';

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['attività']) && isset($_POST['unità'])) {
        $query = sprintf(
            "UPDATE formativa_didattica
            SET didattica = '%s'
            WHERE formativa = '%s'",
            $_POST['unità'],
            $_POST['attività'],
        );

        $conn->query($query);
    }
}
header("Location: http://localhost/registro?page=3");
