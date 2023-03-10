<?php

require("../connect.php");

$db = new Database();
$conn = $db->connect();

$query = sprintf(
    "SELECT nome, cfu 
        FROM piano_di_studi
        WHERE codice = '%s'",
    $_POST['codice']
);

$stmt = $conn->query($query);

if ($stmt->num_rows > 0) {
    $activity = array();
    while ($record = $stmt->fetch_assoc()) {
        extract($record);
        $activity_record = array(
            'nome' => $nome,
            'cfu' => $cfu
        );
        array_push($activity, $activity_record);
    }
    http_response_code(200);
    echo json_encode($activity);
} else {
    http_response_code(404);
    echo json_encode(array("Message" => "No record"));
}
