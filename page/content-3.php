<?php

include_once dirname(__FILE__) . '/../function/getArchiveUnity.php';

$array = array();
$response = getArchiveUnity();

while ($record = $response->fetch_assoc()) {
    $array[] = $record;
}

?>

<h3 class="text-center"><?php echo "Unità Didattiche"; ?></h3>
<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Codice Attività</th>
                    <th scope="col">Nome Attività</th>
                    <th scope="col">Codice Unità</th>
                    <th scope="col">Nome Unità</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($array as $row) : ?>
                    <tr>
                        <td><?php echo $row["a_codice"]; ?></td>
                        <td><?php echo $row["a_nome"]; ?></td>

                        <td><?php echo $row["u_codice"]; ?></td>
                        <td><?php echo $row["u_nome"]; ?></td>

                        <?php if ($user[0]->email == "admin") : ?>
                            <td><a class="btn btn-outline-dark delete-btn" href="http://localhost/registro/function/delete.php?codice=<?php echo $row["codice"]; ?>" role="button">Elimina</a></td>
                        <? endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfooter>
                <tr>
                    <th scope="col">Codice Attività</th>
                    <th scope="col">Nome Attività</th>
                    <th scope="col">Codice Unità</th>
                    <th scope="col">Nome Unità</th>
                    <th scope="col">Azione</th>
                </tr>
            </tfooter>
        </table>
    </div>
</div>