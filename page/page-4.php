<?php

include_once dirname(__FILE__) . '/../function/getArchiveUnity.php';

$array = array();
$response = getArchiveUnity();

while ($record = $response->fetch_assoc()) {
    $array[] = $record;
}

?>

<h3 class="title text-center"><?php echo "Gestione Unità"; ?></h3>
<br />
<div class="row justify-content-center">
    <div class="col-6 text-center">
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
</div>
<br />
<div class="row justify-content-center">
    <div class="col-6 text-center">
        <form action="http://localhost/registro/function/updateUnity.php" method="post">

            <div class="form mb-3">
                <select name="attività">
                    <?php foreach ($array as $row) : ?>
                        <option value="<?php echo $row['a_codice']; ?>">
                            <?php echo $row['a_codice']; ?> - <?php echo $row['a_nome']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form mb-3">
                <select name="unità">
                    <?php foreach ($array as $row) : ?>
                        <option value="<?php echo $row['u_codice']; ?>">
                            <?php echo $row['u_codice']; ?> - <?php echo $row['u_nome']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-outline-dark">Modifica</button>
        </form>
    </div>
</div>