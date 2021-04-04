<?php
require '../../../vendor/autoload.php';
include_once "../../common/getPath.php";

use Sysurvey\Db;
use Models\Factor;
// use Models\Rubric;

$idFactor = $_GET['id'];

$dbFactor = new Factor(new Db());
$factor = $dbFactor->getFactor($idFactor);

// $dbRubrica = new Rubric(new Db());
// $listaRubricas = $dbRubrica->getRubrics($idFactor);
// $headers = ["Id", "Descripción", "Valor"];

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
                        <h4 class="card-title ">Editar factor</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-10 ">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Nombre del factor</label>
                                        <input type="text" class="form-control" name="factorname" id="factorname" value="<?php echo $factor['description']; ?>">
                                    </div>
                                </div>
                                <div class="col-2  text-right mt-4 pt-2">
                                    <button type="button" class="btn btn-primary" onclick="SaveFactor('update');">Guardar</button>
                                </div>

                                <div class="col-md-12 text-right py-2 my-3 border-bottom">
                                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#rubricModal" onclick="rubricAction='new'; ClearRubricFields();">Nueva rúbrica</a>
                                </div>

                                <div class="col-md-12" id="rubrics">

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="reset" class="btn btn-secondary" onclick="location.href = document.referrer;">Volver</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Edit -->
    <div class="modal fade" id="rubricModal" tabindex="-1" role="dialog" aria-labelledby="newRubricModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRubricModalTitle">Rúbrica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Nombre de la rúbrica</label>
                                <input type="text" class="form-control" name="rubricname" id="rubricname">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Valor de rúbrica</label>
                                <input type="text" class="form-control" name="rubricvalue" id="rubricvalue">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="SaveRubric()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete-->
    <div class="modal fade" id="deleteRubricModal" tabindex="-1" role="dialog" aria-labelledby="deleteRubricModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteRubricModalTitle">Rúbrica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            Se eliminara la rúbrica.
                            <br />
                            ¿Desea continuar?
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="SaveRubric()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once "../../common/register-js.php";
    ?>
    <script type="text/javascript">
        let rubricAction = "";
        let idRubric = 0;

        function setValues(action, id) {
            rubricAction = action;
            idRubric = id;
        }

        function ClearRubricFields() {
            document.getElementById('rubricname').value = "";
            document.getElementById('rubricvalue').value = "";
        }

        function SaveFactor(action) {
            connection = createConnection();

            let d = document.getElementById('factorname').value;

            connection.onreadystatechange = function() {
                if (connection.readyState == 4 && connection.status == 200) {
                    let obj = JSON.parse(connection.responseText);
                    alert(obj.msj);
                }
            }

            execute(connection, 'POST', '../../common/actionModels/save-factor.php', "action=" + action + "&idfactor=" + <?php echo $idFactor; ?> + "&d=" + d);
        }

        function CurrentRubric() {
            document.getElementById('rubricname').value = document.getElementById('desc-lbl' + idRubric).value;
            document.getElementById('rubricvalue').value = document.getElementById('val-lbl' + idRubric).value;

        }

        function SaveRubric() {
            let d = document.getElementById('rubricname').value;
            let v = document.getElementById('rubricvalue').value;

            connection = createConnection();

            connection.onreadystatechange = function() {
                if (connection.readyState == 4 && connection.status == 200) {
                    let obj = JSON.parse(connection.responseText);
                    LoadRubric();
                    alert(obj.msj);
                    rubricAction = "";
                    idRubric = 0;
                    ClearRubricFields();
                }
            }

            if (idRubric == 0) {
                params = "action=" + rubricAction + "&idfactor=" + <?php echo $idFactor; ?> + "&d=" + d + "&v=" + v;
            } else {
                params = "action=" + rubricAction + "&idfactor=" + <?php echo $idFactor; ?> + "&idrubric=" + idRubric + "&d=" + d + "&v=" + v;
            }

            execute(connection, 'POST', '../../common/actionModels/save-rubric.php', params);
        }

        function LoadRubric() {
            connection = createConnection();

            let d = document.getElementById('rubrics');

            connection.onreadystatechange = function() {
                if (connection.readyState == 4 && connection.status == 200) {
                    d.innerHTML = connection.responseText;
                }
            }

            execute(connection, 'GET', './rubric/load.php?idfactor=<?php echo $idFactor; ?>');
        }

        window.onload = LoadRubric();
    </script>
</body>

</html>