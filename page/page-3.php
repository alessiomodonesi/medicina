<?php

include_once dirname(__FILE__) . '/../function/getArchiveUnity.php';

$array = array();
$response = getArchiveUnity();

while ($record = $response->fetch_assoc()) {
    $array[] = $record;
}

?>

<h3 class="title text-center"><?php echo "Unità Didattiche"; ?></h3>
<div class="row justify-content-center">
    <div class="col-10">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Codice</th>
                    <th scope="col">Attività</th>
                    <th scope="col">CFU</th>
                    <th scope="col">Codice</th>
                    <th scope="col">Unità</th>
                    <th scope="col">CFU</th>

                    <?php if ($user[0]->ruolo == "Admin") : ?>
                        <th scope="col">Elimina</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($array as $row) : ?>
                    <tr>
                        <td style="font-weight: bold;"><?php echo $row["a_codice"]; ?></td>
                        <td><?php echo strtoupper($row["a_nome"]); ?></td>
                        <td><?php echo $row["a_cfu"]; ?></td>

                        <td style="font-weight: bold;"><?php echo $row["u_codice"]; ?></td>
                        <td><?php echo strtoupper($row["u_nome"]); ?></td>
                        <td><?php echo $row["u_cfu"]; ?></td>

                        <?php if ($user[0]->ruolo == "Admin") : ?>
                            <td>
                                <form action="http://localhost/registro/function/deleteUnity.php" method="post">
                                    <button class="btn btn-outline-dark" name="codice" value="<?php echo $row["u_codice"]; ?>">
                                        <img src="http://localhost/registro/css/img/trash.png" alt="trash" width="20" height="20" class="d-inline-block">
                                    </button>
                                </form>
                            </td>
                        <? endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfooter>
                <tr>
                    <th scope="col">Codice</th>
                    <th scope="col">Attività</th>
                    <th scope="col">CFU</th>
                    <th scope="col">Codice</th>
                    <th scope="col">Unità</th>
                    <th scope="col">CFU</th>

                    <?php if ($user[0]->ruolo == "Admin") : ?>
                        <th scope="col">Elimina</th>
                    <?php endif; ?>
                </tr>
            </tfooter>
        </table>
    </div>
</div>