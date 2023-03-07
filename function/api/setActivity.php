<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../model.php';

$database = new Database();
$db = $database->connect();

$unity = new Model($db);
$codice = $_POST["codice"];
$nome = $_POST["nome"];

$stmt = $unity->setActivity($codice, $nome);
die();
