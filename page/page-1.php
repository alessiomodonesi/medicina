<?php

include_once dirname(__FILE__) . '/../function/getArchiveActivity.php';

$array = array();
$response = getArchiveActivity();

while ($record = $response->fetch_assoc()) {
    $array[] = $record;
}

?>

<h3 class="title text-center"><?php echo "Attività Formative"; ?></h3>
<div class="row justify-content-center ">
    <div class="col-10">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Codice</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CFU</th>

                    <?php if ($user[0]->ruolo == "Admin") : ?>
                        <th scope="col">Elimina</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($array as $row) : ?>
                    <tr>
                        <td style="font-weight: bold;"><?php echo $row["codice"]; ?></td>
                        <td><?php echo $row["nome"]; ?></td>
                        <td><?php echo $row["cfu"]; ?></td>

                        <?php if ($user[0]->ruolo == "Admin") : ?>
                            <td>
                                <form action="http://localhost/registro/function/delete.php" method="post">
                                    <button class="btn btn-outline-dark" name="codice" value="<?php echo $row["codice"]; ?>">
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
                    <th scope="col">Nome</th>
                    <th scope="col">CFU</th>

                    <?php if ($user[0]->ruolo == "Admin") : ?>
                        <th scope="col">Elimina</th>
                    <?php endif; ?>
                </tr>
            </tfooter>
        </table>
    </div>
</div>