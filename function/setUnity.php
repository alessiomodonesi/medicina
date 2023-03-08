<?php

require 'connect.php';

function setUnity($data)
{
    $db = new Database();
    $conn = $db->connect();

    $query = "INSERT INTO formativa_didattica (formativa, didattica)
                VALUES('$data->attività', '$data->unità');
            ";

    return $conn->query($query);
}
