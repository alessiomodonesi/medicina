<?php

include_once dirname(__FILE__) . '/../function/getArchiveUnity.php';

$array = array();
$response = getArchiveUnity();

while ($record = $response->fetch_assoc()) {
    $array[] = $record;
}

?>

<div class="row justify-content-center">
    <div class="col-4 text-center">
        <br />
        <h3 class="title text-center"><?php echo "Collega Unità"; ?></h3>
        <br />
        <form action="http://localhost/registro/function/setUnity.php" method="post">

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="attività" name="attività">
                <label for="floatingInput">Codice dell'attività formativa</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="codice" name="unità">
                <label for="floatingInput">Codice dell'unità didattica</label>
            </div>

            <button type="submit" class="btn btn-outline-dark">Collega</button>
        </form>
    </div>
    <div class="col-1"></div>
    <div class="col-4 text-center">
        <br />
        <h3 class="title text-center"><?php echo "Modifica Unità"; ?></h3>
        <br />
        <form action="http://localhost/registro/function/updateUnity.php" method="post">
            <div class="form mb-3">

                <select class="form-select unity-form" name="attività">
                    <option disabled selected>Seleziona un'attività</option>
                    <?php foreach ($array as $row) : ?>
                        <option value="<?php echo $row['a_codice']; ?>">
                            <?php echo strtoupper($row['a_nome']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <select class="form-select unity-form" name="unità">
                    <option disabled selected>Seleziona un'unità</option>
                    <?php foreach ($array as $row) : ?>
                        <option value="<?php echo $row['u_codice']; ?>">
                            <?php echo strtoupper($row['u_nome']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" class="btn btn-outline-dark mod-btn">Modifica</button>
        </form>
    </div>
</div>