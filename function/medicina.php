<?php

class Medicina
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function setActivity($codice, $nome)
    {
        $query = "INSERT INTO piano_di_studi (codice, nome)
                    VALUES('$codice', '$nome');
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function setUnity($attività, $unità)
    {
        $query = "INSERT INTO formativa_didattica (formativa, didattica)
                    VALUES('$attività', '$unità');
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function delete($codice)
    {
        $query = "DELETE FROM piano_di_studi p WHERE p.codice=$codice";

        $stmt = $this->conn->query($query);
        return $stmt;
    }
}
