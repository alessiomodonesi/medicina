<?php

include_once dirname(__FILE__) . '/../function/connect.php';

$db = new Database();
$conn = $db->connect();

if (isset($_POST['attività']) && isset($_POST['unità'])) {
    $query = sprintf(
        "INSERT INTO formativa_didattica (formativa, didattica)
                VALUES('%s', '%s')",
        $_POST['attività'],
        $_POST['unità']
    );

    $conn->query($query);
    header("Location: http://localhost/registro?page=3");
}

?>

<h3 class="title text-center"><?php echo "Collega Unità"; ?></h3>
<div class="row justify-content-center">
    <div class="col-6 text-center edit-form">
        <form method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="attività" name="attività">
                <label for="floatingInput">Codice dell'attività formativa</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="codice" name="unità">
                <label for="floatingInput">Codice dell'unità didattica</label>
            </div>
            <button type="submit" class="btn btn-outline-dark">Collega</button>
            <button type="submit" class="btn btn-outline-dark" disabled>Modifica</button>
        </form>
    </div>
</div>