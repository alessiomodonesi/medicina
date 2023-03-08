<?php

include_once dirname(__FILE__) . '/../function/setActivity.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['codice']) && !empty($_POST['nome'])) {
        $data = [
            "codice" => $_POST['codice'],
            "nome" => $_POST['nome'],
        ];
        setActivity($data);
    }
}

?>

<h3 class="text-center"><?php echo "Aggiungi Piani di Studio"; ?></h3>
<div class="row">
    <div class="col-3"></div>
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
    <div class="col-3"></div>
</div>