<?php

header("Content-type: application/json; charset=UTF-8");
include_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../user.php';

$data = json_decode(file_get_contents("php://input"));

if (empty($data->email) || empty($data->password)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$database = new Database();
$db = $database->connect();
$user = new User($db);

$result = $user->login($data->email, $data->password);

if ($result != false) {
    http_response_code(200);
    echo json_encode(["response" => true, "userID" => $result]);
} else {
    http_response_code(401);
    echo json_encode(["response" => false]);
}
die();
