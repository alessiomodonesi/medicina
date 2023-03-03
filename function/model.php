<?php

class Model
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function getAttività()
    {
        $query = "SELECT p1.nome, p2.nome FROM piano_di_studi p1
                    INNER JOIN formativa_didattica fd ON p1.codice = fd.formativa
                    INNER JOIN piano_di_studi p2 ON p2.codice = fd.didattica
                    WHERE 1=1;
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function getUnitàByAttività($codice)
    {
        $query = "SELECT p1.nome, p2.nome FROM piano_di_studi p1
                    INNER JOIN formativa_didattica fd ON p1.codice = fd.formativa
                    INNER JOIN piano_di_studi p2 ON p2.codice = fd.didattica
                    WHERE p1.codice = $codice;
                ";

        $stmt = $this->conn->query($query);

        return $stmt;
    }
}
