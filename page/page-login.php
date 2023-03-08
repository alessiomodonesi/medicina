<?php

include_once dirname(__FILE__) . '/../function/login/login.php';
session_start();
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $data = [
            "email" => $_POST['username'],
            "password" => $_POST['password'],
        ];
        if (login($data) == -1) {
            $error = "Credenziali errate. Si prega di riprovare.";
        }
    }
}

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</br>
<h2 class="title text-center"><?php echo "Login"; ?></h2>
</br>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-4 text-center">
            <form method="post">
                <div class="form-floating mb-3 username">
                    <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3 password">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="row utils">
                    <div class="col-12 text-center">
                        <p><?php echo $error; ?></p>
                        <input type="checkbox" class="form-check-input" id="show-btn" onclick="hide()">
                        <label class="form-check-label" id="show-passwd">Mostra Password</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-dark login-btn">Login</button>
            </form>
        </div>
    </div>
</div>

<style>
    .login-btn {
        margin-top: 2vh;
    }

    .btn-outline-dark:hover {
        background-color: white;
        font-weight: bold;
        color: black;
    }
</style>

<script>
    function hide() {
        var x = document.getElementById("floatingPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>