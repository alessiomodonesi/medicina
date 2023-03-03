<?php

class Model
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function getArchiveActivity()
    {
        $query = "SELECT DISTINCT p.codice, p.nome FROM piano_di_studi p
                    INNER JOIN formativa_didattica fd ON p.codice = fd.formativa;
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function getArchiveUnity()
    {
        $query = "SELECT DISTINCT p.codice, p.nome FROM piano_di_studi p
                    INNER JOIN formativa_didattica fd ON p.codice = fd.didattica;
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function getActivity($codice)
    {
        $query = "SELECT DISTINCT p.codice, p.nome FROM piano_di_studi p
                    INNER JOIN formativa_didattica fd ON p.codice = fd.formativa
                    WHERE p.codice = '" . $codice . "';
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function getUnity($codice)
    {
        $query = "SELECT DISTINCT p.codice, p.nome FROM piano_di_studi p
                    INNER JOIN formativa_didattica fd ON p.codice = fd.didattica
                    WHERE p.codice = '" . $codice . "';
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }
}
