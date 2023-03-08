<?php

require 'base.php';

class Medicina extends Base
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function getArchiveActivity()
    {
        $query = "SELECT * FROM formativa_didattica fd
                    RIGHT JOIN piano_di_studi p ON p.codice = fd.didattica
                    WHERE fd.didattica IS NULL;
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function getDividedUnity()
    {
        $query = "SELECT p1.codice AS 'a_codice', p1.nome AS 'a_nome', p2.codice AS 'u_codice', p2.nome AS 'u_nome' 
                    FROM piano_di_studi p1
                    INNER JOIN formativa_didattica fd ON p1.codice = fd.formativa
                    INNER JOIN piano_di_studi p2 ON p2.codice = fd.didattica;
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
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

    // altre funzioni non usate

    function getArchiveUnity()
    {
        $query = "SELECT DISTINCT * FROM piano_di_studi p
                    INNER JOIN formativa_didattica fd ON p.codice = fd.didattica;
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function getActivity($codice)
    {
        $query = "SELECT DISTINCT * FROM piano_di_studi p
                    INNER JOIN formativa_didattica fd ON p.codice = fd.formativa
                    WHERE p.codice = '" . $codice . "';
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function getUnity($codice)
    {
        $query = "SELECT DISTINCT * FROM piano_di_studi p
                    INNER JOIN formativa_didattica fd ON p.codice = fd.didattica
                    WHERE p.codice = '" . $codice . "';
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }
}
