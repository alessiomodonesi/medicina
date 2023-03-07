<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../model.php';

$database = new Database();
$db = $database->connect();

$unity = new Model($db);
$attività = $_POST["attività"];
$unità = $_POST["unità"];

$stmt = $unity->setUnity($attività, $unità);
header("Location: http://localhost/registro");
die();