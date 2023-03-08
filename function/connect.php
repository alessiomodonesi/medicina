<?php

class Database
{
    public $conn;
    public function connect()
    {
        try {
            $this->conn = new mysqli('localhost', 'root', '', 'medicina', '3306');
        } catch (Exception $ex) {
            die("Error connecting to database $ex\n\n");
        }
        return $this->conn;
    }
}
