<?php

include_once dirname(__FILE__) . '/../function/getArchiveActivity.php';

$array = array();
$response = getArchiveActivity();

while ($record = $response->fetch_assoc()) {
    $array[] = $record;
}

?>

<h3 class="text-center"><?php echo "Attività Formative"; ?></h3>
<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Codice</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($array as $row) : ?>
                    <tr>
                        <td><?php echo $row["codice"]; ?></td>
                        <td><?php echo $row["nome"]; ?></td>

                        <?php if ($user[0]->email == "admin") : ?>
                            <td><a href="http://localhost/registro/function/delete.php?codice=<?php echo $row["codice"]; ?>">Elimina</a></td>
                        <? endif; ?>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfooter>
                <tr>
                    <th scope="col">Codice</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Azione</th>
                </tr>
            </tfooter>
        </table>
    </div>
</div>