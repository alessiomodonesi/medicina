<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../model.php';

$database = new Database();
$db = $database->connect();

$unity = new Model($db);

$stmt = $unity->getArchiveUnity();

if ($stmt->num_rows > 0) {
    $unity_arr = array();
    while ($record = $stmt->fetch_assoc()) {
        extract($record);
        $unity_record = array(
            'codice' => $codice,
            'nome' => $nome
        );
        array_push($unity_arr, $unity_record);
    }
    http_response_code(200);
    echo json_encode($unity_arr, JSON_PRETTY_PRINT);
} else {
    http_response_code(404);
    echo json_encode(array("Message" => "No record"));
}
die();
