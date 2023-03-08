<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../medicina.php';

$database = new Database();
$db = $database->connect();

$unity = new Medicina($db);

$stmt = $unity->getDividedUnity();

if ($stmt->num_rows > 0) {
    $unity_arr = array();
    while ($record = $stmt->fetch_assoc()) {
        extract($record);
        $unity_record = array(
            'a_codice' => $a_codice,
            'a_nome' => $a_nome,
            'u_codice' => $u_codice,
            'u_nome' => $u_nome
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
