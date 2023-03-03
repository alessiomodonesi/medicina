<?php

function getUser($id)
{
    $url = 'http://localhost/food-api/API/user/getUser.php?id=' . $id;
    return json_decode(file_get_contents($url));
}

function checkLogin()
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $user = getUser($id);
        return $user;
    }

    header("Location: http://localhost/registro/page/login.php");
}
