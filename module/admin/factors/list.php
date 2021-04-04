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
            <div class="col-md-12 m-2">
                <a class="btn btn-primary" href="./new.php">Nuevo Factor</a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Factores registrados</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body" id="factors">
                    </div>
                </div>
            </div>
        </div>
    </main>



    <?php
    include_once "../../common/register-js.php";
    ?>

    <script type="text/javascript">
        let factorAction = "";
        let idFactor = 0;

        function setValues(action, id) {
            factorAction = action;
            idFactor = id;
        }

        function SaveFactor() {
            connection = createConnection();

            connection.onreadystatechange = function() {
                if (connection.readyState == 4) {
                    let obj = JSON.parse(connection.responseText);
                    LoadFactors();
                    factorAction = "";
                    idFactor = 0;
                    alert(obj.msj);
                }
            }

            execute(connection, 'POST', '../../common/actionModels/save-factor.php', "action=" + factorAction + "&idfactor=" + idFactor);
        }

        function LoadFactors() {
            connection = createConnection();

            let d = document.getElementById('factors');

            connection.onreadystatechange = function() {
                if (connection.readyState == 4) {
                    d.innerHTML = connection.responseText;
                }
            }

            execute(connection, 'GET', './load.php');
        }

        window.onload = LoadFactors();
    </script>
</body>

</html>