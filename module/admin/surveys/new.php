<?php
require '../../../vendor/autoload.php';
include_once "../../common/getPath.php";
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
                        <h4 class="card-title ">Nueva encuesta</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Nombre de encuesta</label>
                                        <input type="text" class="form-control" name="surveyname" id="surveyname">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" id="add-question">
                                                Agregar preguntas
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="reset" class="btn btn-secondary" onclick="location.href = document.referrer;">Cancelar</button>
                                        <button type="button" class="btn btn-primary" onclick="SaveSurvey('new');">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once "../../common/register-js.php";
    ?>

    <script type="text/javascript">
        function SaveSurvey(action) {
            let backUrl = document.referrer;
            connection = createConnection();

            let d = document.getElementById('surveyname').value;
            let r = document.getElementById('add-question').checked;

            connection.onreadystatechange = function() {
                if (connection.readyState == 4) {
                    let obj = JSON.parse(connection.responseText);
                    alert(obj.msj);
                    if (obj.error == false) {
                        if (r == true) {
                            location.href = "./edit.php?id=" + obj.opt;
                        } else {
                            location.href = backUrl;
                        }
                    }
                }
            }

            execute(connection, 'POST', './save-survey.php', "action=" + action + "&name=" + d + "&active=true")

        }
    </script>

</body>

</html>