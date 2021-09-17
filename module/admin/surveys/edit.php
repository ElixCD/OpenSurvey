<?php
require '../../../vendor/autoload.php';
include_once "../../common/getPath.php";

use Domain\SurveyDomain;
use Domain\FactorDomain;

$idSurvey = $_GET['id'];

$dbSurvey = new SurveyDomain();
$survey = $dbSurvey->getSurvey($idSurvey);

$dbFactor = new FactorDomain();
$factors = $dbFactor->getFactors(1);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - <?php echo $moduleName; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <?php
    include_once "../../common/register-css.php";
    ?>
</head>

<body>
    <?php
    include_once "../admin-nav.php";
    include_once "../../common/header.php";
    ?>

    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Editar encuesta</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <form class="pb-2 mb-3 border-bottom">
                            <div class="row  justify-content-between">
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Nombre de encuesta</label>
                                        <input type="text" class="form-control" name="surveyname" id="surveyname" value="<?php echo $survey['name'] ?>">
                                    </div>
                                    <div class="form-group form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" id="survey-active" name="survey-active" <?php echo $survey['active'] == 1 ? "checked" : ""; ?>>
                                            Activo
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-primary" onclick="SaveSurvey('update');">Guardar</button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-nav-tabs card-plain">
                                    <div class="card-header card-header-primary">
                                    <div class="row">
                                            <div class="col-md-9"><label class="card-title">Preguntas</label></div>
                                            <div class="col-md-3 text-end">
                                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal" onclick="questionAction='new'; ClearQuestionFields();">
                                                    <span class="material-icons">add_circle_outline</span>
                                                    <span class="btn-single-icon">Nueva</span>
                                                </button>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="card-body ">
                                        <div id="question-list">

                                        </div>
                                        <!-- <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                <li class="page-item"><a class="page-link" href="#">1</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">2</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">3</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">Next</a>
                                                </li>
                                            </ul>
                                        </nav> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3 text-end">
                                <!-- <button type="reset" class="btn btn-secondary" onclick="location.href = document.referrer;">Cancelar</button> -->
                                <button type="button" class="btn btn-secondary" onclick="location.href = document.referrer;">Volver</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal add question -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle" id="addModal">Encuesta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" arial-label="close">
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Reactivo</label>
                                    <input type="text" class="form-control" name="question" id="question">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Nombre de los factores</label>
                                <select class="form-control selectpicker" data-style="btn btn-link" name="factores" id="factores">
                                    <option value=""> -- Seleccione un valor -- </option>
                                    <?php foreach ($factors as $factor) : ?>
                                        <option value="<?php echo $factor['idfactor'] ?>"><?php echo $factor['description'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="" id="mandatory" name="mandatory" >
                                    Obligatorio
                                </label>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="SaveQuestion()">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal delete question -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle" id="deleteModalLabel">Eliminar reactivo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" arial-label="close">
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <h5>Eliminar reactivo</h5>
                        <p>Esta a punto de eliminar un reactivo ¿Esta seguro de continuar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="SaveQuestion()">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include_once "../../common/register-js.php";
    ?>

    <script type="text/javascript">
        let questionAction = "";
        let idQuestion = 0;

        function setValues(action, id) {
            questionAction = action;
            idQuestion = id;
        }

        function ClearQuestionFields() {
            document.getElementById('question').value = "";
            document.getElementById('factores').value = "";
            document.getElementById('mandatory').checked = false;
        }

        function SaveSurvey(action) {
            connection = createConnection();

            let d = document.getElementById('surveyname').value;
            let a = document.getElementById('survey-active').checked;

            connection.onreadystatechange = function() {
                if (connection.readyState == 4 && connection.status == 200) {
                    let obj = JSON.parse(connection.responseText);
                    alert(obj.msj);
                }
            }

            execute(connection, 'POST', '../../common/actionModels/save-survey.php', "action=" + action + "&idSurvey=" + <?php echo $idSurvey; ?> + "&name=" + d + "&active=" + a);
        }

        function CurrentQuestion() {
            document.getElementById('question').value = document.getElementById('question-lbl' + idQuestion).value;
            document.getElementById('factores').value = document.getElementById('factor-lbl' + idQuestion).value;
            document.getElementById('mandatory').checked = document.getElementById('mandatory-chk' + idQuestion).checked;
        }

        function SaveQuestion() {
            let d = document.getElementById('question').value;
            let idfactor = document.getElementById('factores').value;
            let mandatory = document.getElementById('mandatory').checked;

            connection = createConnection();

            connection.onreadystatechange = function() {
                if (connection.readyState == 4 && connection.status == 200) {
                    let obj = JSON.parse(connection.responseText);
                    ClearQuestionFields();
                    LoadQuestions();
                    alert(obj.msj);
                    questionAction = "";
                    idQuestion = 0;
                }
            }

            if (idQuestion == 0) {
                params = "action=" + questionAction + "&idfactor=" + idfactor + "&idSurvey=" + <?php echo $idSurvey; ?> + "&d=" + d + "&mandatory=" + mandatory;
            } else {
                params = "action=" + questionAction + "&idfactor=" + idfactor + "&idSurvey=" + <?php echo $idSurvey; ?> + "&idQuestion=" + idQuestion + "&d=" + d + "&mandatory=" + mandatory;
            }

            execute(connection, 'POST', '../../common/actionModels/save-question.php', params);
        }

        function LoadQuestions() {
            connection = createConnection();

            let d = document.getElementById('question-list');

            connection.onreadystatechange = function() {
                if (connection.readyState == 4 && connection.status == 200) {
                    d.innerHTML = connection.responseText;
                }
            }

            execute(connection, 'GET', './question/load.php?idsurvey=<?php echo $idSurvey; ?>');
        }

        window.onload = LoadQuestions();
    </script>

</body>

</html>