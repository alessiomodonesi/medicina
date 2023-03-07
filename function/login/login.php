<?php

function login($data)
{
    $url = 'http://localhost/registro/function/api/login.php';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Content-Type: application/json",
        "Content-Lenght: 0",
    );

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    $responseJson = curl_exec($curl);
    curl_close($curl);

    $response = json_decode($responseJson);
    if ($response->response == true) {
        $_SESSION['user_id'] = $response->userID;
        header('Location: http://localhost/registro');
    } else {
        return -1;
    }
}
