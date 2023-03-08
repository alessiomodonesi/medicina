<?php

header("Content-type: application/json; charset=UTF-8");
include_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../user.php';

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(["message" => "Insert the id param"]);
    exit();
}

$id = explode("?id=", $_SERVER["REQUEST_URI"])[1];

if (empty($id)) {
    http_response_code(404);
    echo json_encode(["message" => "Insert a valid ID"]);
    exit();
}

$database = new Database();
$db = $database->connect();

$user = new User($db);
$user->getUser($id);
