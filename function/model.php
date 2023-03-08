<?php

class Model
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // funzioni per il login (usate tutte)

    function login($email, $password)
    {
        $sql = sprintf("SELECT email, password, id FROM `user`");
        $result = $this->conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            if ($this->conn->real_escape_string($email) == $this->conn->real_escape_string($row["email"]) && $this->conn->real_escape_string($password) == $this->conn->real_escape_string($row["password"])) {
                return $this->conn->real_escape_string($row["id"]);
            }
        }

        return false;
    }

    function getUser($id)
    {
        $sql = sprintf(
            "SELECT id, name, surname, email
            FROM user
            WHERE id = %d;",
            $this->conn->real_escape_string($id)
        );

        $result = $this->conn->query($sql);
        $this->SendOutput($result, JSON_PRETTY_PRINT);
    }

    function SendOutput($data, $headers = array())
    {
        $this->SetHeaders($headers);

        $arr = array();
        while ($row = $data->fetch_assoc()) {
            array_push($arr, $row);
        }
        print_r(json_encode($arr, JSON_PRETTY_PRINT));
        exit;
    }

    function SetHeaders($httpHeaders = array())
    {
        header_remove('Set-Cookie');
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
    }


    // inizio funzioni specifiche

    function getArchiveActivity() // funzionare
    {
        $query = "SELECT * FROM formativa_didattica fd
                    RIGHT JOIN piano_di_studi p ON p.codice = fd.didattica
                    WHERE fd.didattica IS NULL;
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function getArchiveUnity() // non usata
    {
        $query = "SELECT DISTINCT * FROM piano_di_studi p
                    INNER JOIN formativa_didattica fd ON p.codice = fd.didattica;
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function getActivity($codice) // non usata
    {
        $query = "SELECT DISTINCT * FROM piano_di_studi p
                    INNER JOIN formativa_didattica fd ON p.codice = fd.formativa
                    WHERE p.codice = '" . $codice . "';
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function getUnity($codice) // non usata
    {
        $query = "SELECT DISTINCT * FROM piano_di_studi p
                    INNER JOIN formativa_didattica fd ON p.codice = fd.didattica
                    WHERE p.codice = '" . $codice . "';
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function getDividedUnity() // funzionante
    {
        $query = "SELECT p1.codice AS 'a_codice', p1.nome AS 'a_nome', p2.codice AS 'u_codice', p2.nome AS 'u_nome' 
                    FROM piano_di_studi p1
                    INNER JOIN formativa_didattica fd ON p1.codice = fd.formativa
                    INNER JOIN piano_di_studi p2 ON p2.codice = fd.didattica;
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function setActivity($codice, $nome) // funzionante
    {
        $query = "INSERT INTO piano_di_studi (codice, nome)
                    VALUES('$codice', '$nome');
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function setUnity($attività, $unità) // funzionante
    {
        $query = "INSERT INTO formativa_didattica (formativa, didattica)
                    VALUES('$attività', '$unità');
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }
}
