<?php
include_once dirname(__FILE__) . '/function/login/checkLogin.php';
session_start();
$user = checkLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet" crossorigin="anonymous">
    <title>Registro Universitario</title>
</head>

<body>
    <div class="container-fluid" id="header">
        <?php require "template/header.php" ?>
    </div>

    <div class="container-fluid" id="main"></br>
        <?php if (!isset($_GET['page'])) : ?>
            <h3 class="text-center"> <?php echo "Home Page"; ?></h3>
            <div class="row justify-content-center username">
                <div class="col-4 text-center">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Cognome</th>
                                <th scope="col">Username</th>
                                <th scope="col">Ruolo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $user[0]->nome; ?></td>
                                <td><?php echo $user[0]->cognome; ?></td>
                                <td><?php echo $user[0]->email; ?></td>
                                <td><?php echo $user[0]->ruolo; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col text-center">
                    <a class="btn btn-outline-dark logout-btn" href="function/login/logout.php" role="button">Esci</a>
                </div>
            </div>
        <?php else :
            $page = $_GET['page'];
            switch ($page) {
                case 1:
                    require "page/content-1.php";
                    break;
                case 2:
                    if ($user[0]->ruolo == "Admin")
                        require "page/content-2.php";
                    else
                        require("page/content-404.php");
                    break;
                case 3:
                    require "page/content-3.php";
                    break;
                case 4:
                    if ($user[0]->ruolo == "Admin")
                        require "page/content-4.php";
                    else
                        require("page/content-404.php");
                    break;
                default:
                    require("page/content-404.php");
            }

        endif;
        ?>
    </div></br>

    <div class="container-fluid" id="footer">
        <?php require "template/footer.php" ?>
    </div>
</body>

</html>