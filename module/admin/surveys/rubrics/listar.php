<?php
$backRoot = '../../../../';
require $backRoot . 'vendor/autoload.php';
use Sysurvey\Db;

if (isset($_POST['idFactor']))
    $id = $_POST['idFactor'];
else
    $id = $_COOKIE['idFactor'];   

$rubric = new Models\Rubric(new Db());
$ListRubric = $rubric->getRubrics($id,1);

?>

<?php if ($ListRubric !== false) : ?>
    <?php if (count($ListRubric) > 0) : ?>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>Rubrica</th>
                    <th>Valor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ListRubric as $row) : ?>
                    <tr>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><a href="./editar.php?idSurvey=<?php //echo $row['idquestions']; 
                                                            ?>">Editar</a> | Borrar </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No se encontrarón datos</p>
    <?php endif ?>
<?php else : ?>
    <p>No se encontrarón datos</p>
<?php endif ?>