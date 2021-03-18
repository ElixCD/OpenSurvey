<?php
require '../../../../vendor/autoload.php';

use Sysurvey\Db;
use Models\Question;
use Models\Factor;

$idSurvey = $_GET['idsurvey'];

$dbQuestions = new Question(new Db());
$dbFactors = new Factor(new Db());
$questions = $dbQuestions->getQuestions($idSurvey, 1);
$headers = ["Id", "Descripción", "Valor"];
?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark text-primary">
            <th class="text-center">ID</th>
            <th class="text-center">Pregunta</th>
            <th class="text-center">Factor</th>
            <th class="text-center">Obligatorio</th>
            <th class="text-center">Accion</th>
        </thead>
        <tbody>
            <?php foreach ($questions as $question) : ?>
                <tr>
                    <td class="text-center"><?php echo $question['idquestion']; ?></td>
                    <td>
                        <input type="hidden" id="question-lbl<?php echo $question['idquestion']; ?>" value="<?php echo $question['value']; ?>" />
                        <?php echo $question['value']; ?>
                    </td>
                    <td class="text-center">
                        <input type="hidden" id="factor-lbl<?php echo $question['idquestion']; ?>" value="<?php echo $question['factors_idfactor']; ?>" />
                        <?php
                        $factor = $dbFactors->getFactor($question['factors_idfactor']);
                        echo $factor['description'];
                        ?>
                    </td>

                    <td class="text-center">
                        <input class="form-check-input" id="mandatory-chk<?php echo $question['idquestion']; ?>" type="checkbox" value="" <?php echo ($question['mandatory'] == 1) ? "checked" : ""; ?> disabled>
                    </td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal" title="Editar" onclick="setValues('update',<?php echo $question['idquestion']; ?>);CurrentQuestion();">
                                <i class="material-icons">edit</i>
                            </button>
                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteModal" title="Eliminar" onclick="setValues('delete',<?php echo $question['idquestion']; ?>);">
                                <i class="material-icons">delete</i>
                            </button>

                            <!-- <a class="btn btn-primary" href="./edit.php">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="btn btn-danger">
                            <i class="material-icons">delete</i>
                         </a> -->
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>