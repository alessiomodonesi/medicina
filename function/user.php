<?php

require 'base.php';

class User extends Base
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

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
}
