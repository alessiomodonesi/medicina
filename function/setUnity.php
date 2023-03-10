<?php

require("connect.php");

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['attività']) && isset($_POST['unità'])) {
        $query = sprintf(
            "INSERT INTO formativa_didattica (formativa, didattica)
            VALUES('%s', '%s')",
            $_POST['attività'],
            $_POST['unità']
        );

        $conn->query($query);
    }
}
header("Location: http://localhost/registro?page=3");
