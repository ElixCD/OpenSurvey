<?php

use Sysurvey\Db;

$backRoot = '../../../';
require $backRoot . 'vendor/autoload.php';
$Survey = new Models\Survey(new Db);
$Surveys = $Survey->getSurveys(1);
$headers = ["Id", "Descripción"];
?>

<?php if ($Surveys !== false) : ?>
    <?php if (count($Surveys) > 0) : ?>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <?php foreach ($headers as $key => $value) : ?>
                        <th scope="col"><?php echo $value; ?></th>
                    <?php endforeach ?>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Surveys as $row) : ?>
                    <tr>
                        <?php foreach ($row as $key => $value) : ?>
                            <?php if ($key != 'idmodule') : ?>
                                <td><?php echo $value; ?></td>
                            <?php endif ?>
                        <?php endforeach ?>
                        <td><a class="alert-link" onclick="Breadcrumb('Encuestas','Editar');ViewLoad('Editar');">Editar</a> | Borrar </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No se encontrarón datos</p>
    <?php endif ?>
<?php else : ?>
    <p>No se encontro la tabla</p>
<?php endif ?>
