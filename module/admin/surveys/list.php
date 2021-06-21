<?php
require '../../../vendor/autoload.php';
include_once '../../common/getPath.php';

// use OurVoice\Db;
// use Models\Survey;

// $Survey = new Survey(new Db());
// $Surveys = $Survey->getSurveys(1);
// $headers = ["Id", "Descripción"];

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
            <div class="col-12 m-2">
                <a class="btn btn-primary" href="./new.php">Nueva encuesta</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Encuestas registradas</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div id="surveys" class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once "../../common/register-js.php";
    ?>
    
    <script type="text/javascript">
        let surveyAction = "";
        let idSurvey = 0;

        function setValues(action, id) {
            surveyAction = action;
            idSurvey = id;
        }

        function SaveSurvey() {
            connection = createConnection();

            connection.onreadystatechange = function() {
                if (connection.readyState == 4) {
                    let obj = JSON.parse(connection.responseText);
                    LoadSurveys();
                    surveyAction = "";
                    idSurvey = 0;
                    alert(obj.msj);
                }
            }

            execute(connection, 'POST', '../../common/actionModels/save-factor.php', "action=" + surveyAction + "&idSurvey=" + idSurvey);
        }

        function LoadSurveys() {
            connection = createConnection();

            let d = document.getElementById('surveys');

            connection.onreadystatechange = function() {
                if (connection.readyState == 4) {
                    d.innerHTML = connection.responseText;
                }
            }

            execute(connection, 'GET', './load.php');
        }

        window.onload = LoadSurveys();
    </script>

</body>

</html>