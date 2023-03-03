<?php
$url = 'http://localhost/registro/function/api/getArchiveUnity.php';
$array = json_decode(file_get_contents($url));
?>

<h3 class="text-center"><?php echo "Unità Formative"; ?></h3>
<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Codice</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CFU</th>
                    <th scope="col">Settore</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($array); $i++) : ?>
                    <tr>
                        <td><?php echo $array[$i]->codice; ?></td>
                        <td><?php echo $array[$i]->nome; ?></td>
                        <td><?php echo $array[$i]->cfu; ?></td>
                        <td><?php echo $array[$i]->settore; ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</div>