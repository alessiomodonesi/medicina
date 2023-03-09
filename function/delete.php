<?php

require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['codice'])) {
        $db = new Database();
        $conn = $db->connect();

        $query = sprintf(
            "SELECT fd.didattica 
            FROM formativa_didattica fd 
            INNER JOIN piano_di_studi pd ON pd.codice = fd.formativa
            WHERE pd.codice = '%s'",
            $_POST['codice']
        );

        $result =  $conn->query($sql);

        if ($result->num_rows > 0) {
            unset($query);
            $query = sprintf("DELETE FROM formativa_didattica WHERE formativa = '%s'", $id);
            $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                unset($query);
                $query = sprintf("DELETE FROM piano_di_studi WHERE codice = '%s'", $row['didattica']);
                $conn->query($query);
            }
        }

        unset($query);
        $query = sprintf("DELETE FROM piano_di_studi WHERE codice = '%s'", $id);
        $conn->query($sql);

        header("Location: http://localhost/registro?page=1");
    }
}
