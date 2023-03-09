<?php

require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['codice'])) {
        $db = new Database();
        $conn = $db->connect();

        $query = sprintf(
            "SELECT fd.formativa
            FROM formativa_didattica fd 
            INNER JOIN piano_di_studi pd ON pd.codice = fd.didattica
            WHERE pd.codice = '%s'",
            $_POST['codice']
        );

        $result =  $conn->query($query);

        if ($result->num_rows > 0) {
            unset($query);
            $query = sprintf(
                "DELETE FROM formativa_didattica 
                WHERE didattica = '%s'",
                $_POST['codice']
            );

            $conn->query($query);
        }

        unset($query);
        $query = sprintf(
            "DELETE FROM piano_di_studi 
            WHERE codice = '%s'",
            $_POST['codice']
        );

        $conn->query($query);
        header("Location: http://localhost/registro?page=3");
    }
}
