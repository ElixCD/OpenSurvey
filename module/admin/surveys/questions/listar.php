<?php
$backRoot = '../../../../';
require $backRoot . 'vendor/autoload.php';
use Sysurvey\Db;

if (isset($_POST['idFactor']))
    $id = $_POST['idFactor'];
else
    $id = $_COOKIE['idFactor'];

$question = new Models\Question(new Db());
$ListQuestions = $question->getQuestions($id,1);
?>

<?php if ($ListQuestions !== false) : ?>
    <?php if (count($ListQuestions) > 0) : ?>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>Pregunta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ListQuestions as $row) : ?>
                    <tr>
                        <td><?php echo $row['value']; ?></td>
                        <td><a href="" data-toggle="modal" data-target="#question-modal" onclick="javascript:actionQuestion='update';" >Editar</a> | Borrar </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td class="">
                    </td>
                </tr>
            </tfoot>
        </table>
    <?php else : ?>
        <p>No se encontrarón datos</p>
    <?php endif ?>
<?php else : ?>
    <p>No se encontrarón datos</p>
<?php endif ?>