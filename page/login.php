<?php
include_once dirname(__FILE__) . '/../function/login/login.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $data = [
            "email" => $_POST['email'],
            "password" => $_POST['password'],
        ];
        login($data);
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<link href="css/style.css" rel="stylesheet" crossorigin="anonymous">

</br>
<h3 class="text-center"><?php echo "Login"; ?></h3>
</br>

<div class="container-fluid">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 text-center">
            <form method="post">
                <div class="form-floating mb-3 email">
                    <input type="text" class="form-control" id="floatingInput" placeholder="username" name="email">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3 password">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="row utils">
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" id="show-btn" onclick="hidePasswd()">
                        <label class="form-check-label" id="show-passwd">Show Password</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-dark login-btn" style="margin-top: 1vh;">Login</button>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<script>
    function hidePasswd() {
        var x = document.getElementById("floatingPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>