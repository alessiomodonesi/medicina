<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../medicina.php';

$database = new Database();
$db = $database->connect();

$activity = new Medicina($db);

$stmt = $activity->getArchiveActivity();

if ($stmt->num_rows > 0) {
    $activity_arr = array();
    while ($record = $stmt->fetch_assoc()) {
        extract($record);
        $activity_record = array(
            'codice' => $codice,
            'nome' => $nome,
            'cfu' => $cfu
        );
        array_push($activity_arr, $activity_record);
    }
    http_response_code(200);
    echo json_encode($activity_arr, JSON_PRETTY_PRINT);
} else {
    http_response_code(404);
    echo json_encode(array("Message" => "No record"));
}
die();
