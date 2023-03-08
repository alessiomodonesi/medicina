<?php

include_once dirname(__FILE__) . '/../function/connect.php';

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['codice']) && isset($_POST['nome'])) {
        $query = sprintf(
            "INSERT INTO piano_di_studi (codice, nome)
                VALUES('%s', '%s')",
            $_POST['codice'],
            $_POST['nome']
        );

        $conn->query($query);
        header("Location: http://localhost/registro?page=1");
    }
}

?>

<h3 class="title text-center"><?php echo "Aggiungi Piani di Studio"; ?></h3>
<div class="row justify-content-center">
    <div class="col-6 text-center edit-form">
        <form method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="codice" name="codice">
                <label for="floatingInput">Codice del piano di studio</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="nome" name="nome">
                <label for="floatingInput">Nome del piano di studio</label>
            </div>
            <button type="submit" class="btn btn-outline-dark">Aggiungi</button>
            <button type="submit" class="btn btn-outline-dark" disabled>Modifica</button>
        </form>
    </div>
</div>