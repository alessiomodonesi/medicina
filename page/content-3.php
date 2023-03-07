<?php
$url = 'http://localhost/registro/function/api/getDividedUnity.php';
$array = json_decode(file_get_contents($url));
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
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($array); $i++) : ?>
                    <tr>
                        <?php if ($i == 0 || $array[$i]->a_codice != $array[$i - 1]->a_codice) : ?>
                            <td><?php echo $array[$i]->a_codice; ?></td>
                            <td><?php echo $array[$i]->a_nome; ?></td>
                        <?php else : ?>
                            <td></td>
                            <td></td>
                        <?php endif; ?>
                        <td><?php echo $array[$i]->u_codice; ?></td>
                        <td><?php echo $array[$i]->u_nome; ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
            <tfooter>
                <tr>
                    <th scope="col">Codice Attività</th>
                    <th scope="col">Nome Attività</th>
                    <th scope="col">Codice Unità</th>
                    <th scope="col">Nome Unità</th>
                </tr>
            </tfooter>
        </table>
    </div>
</div>