<?php

class Model
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
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

    function getArchiveActivity()
    {
        $query = "SELECT DISTINCT * FROM piano_di_studi p
                    INNER JOIN formativa_didattica fd ON p.codice = fd.formativa;
                ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

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
