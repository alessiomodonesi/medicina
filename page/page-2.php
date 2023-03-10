<?php

include_once dirname(__FILE__) . '/../function/getArchiveActivity.php';

$array = array();
$response = getArchiveActivity();

while ($record = $response->fetch_assoc()) {
    $array[] = $record;
}

?>


<div class="row justify-content-center">
    <div class="col-4 text-center">
        <br />
        <h3 class="title text-center"><?php echo "Aggiungi Piani di Studio"; ?></h3>
        <br />
        <form action="http://localhost/registro/function/setActivity.php" method="post">

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="codice" name="codice">
                <label for="floatingInput">Codice del piano di studio</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="nome" name="nome">
                <label for="floatingInput">Nome del piano di studio</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="codice" name="cfu">
                <label for="floatingInput">CFU del piano di studio</label>
            </div>

            <button type="submit" class="btn btn-outline-dark">Aggiungi</button>
        </form>
    </div>
    <div class="col-1"></div>
    <div class="col-4 text-center">
        <br />
        <h3 class="title text-center"><?php echo "Modifica Piani di Studio"; ?></h3>
        <br />
        <form action="http://localhost/registro/function/updateActivity.php" method="post">
            <div class="form mb-3">
                <label>Codice attività</label>
                <select class="text-center update-form" name="codice" style="width: 30vw;">
                    <?php foreach ($array as $row) : ?>
                        <option value="<?php echo $row['codice']; ?>">
                            <?php echo $row['codice']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="nome" name="nome" id="InputNome">
                <label for=" floatingInput">Nome del piano di studio</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" placeholder="nome" name="cfu" id="InputCFU">
                <label for="floatingInput">CFU del piano di studio</label>
            </div>

            <button type="submit" class="btn btn-outline-dark">Modifica</button>
        </form>
    </div>
</div>

<script type="text/javascript" src="http://localhost/registro/function/js/getActivity.js"></script>