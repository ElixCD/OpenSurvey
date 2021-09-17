<?php
require '../../../vendor/autoload.php';
include_once '../../common/getPath.php';

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
                        <div class="row ">
                            <div class="col-md-10">
                                <h4 class="card-title ">Usuarios registrados</h4>
                            </div>
                            <div class="col-md-2 text-end">
                                <a class="btn btn-primary" href="./new.php">Nuevo usuario</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="user-list">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once "../../common/register-js.php";
    ?>

    <script type="text/javascript">
        let userAction = "";
        let idUser = 0;

        function setValues(action, id) {
            userAction = action;
            idUser = id;
        }

        function SaveUser() {
            connection = createConnection();

            connection.onreadystatechange = function() {
                if (connection.readyState == 4) {
                    let obj = JSON.parse(connection.responseText);
                    LoadUsers();
                    userAction = "";
                    idUser = 0;
                    alert(obj.msj);
                }
            }

            execute(connection, 'POST', '../../common/actionModels/save-user.php', "action=" + userAction + "&iduser=" + idUser);
        }

        function LoadUsers() {
            connection = createConnection();

            let d = document.getElementById('user-list');

            connection.onreadystatechange = function() {
                if (connection.readyState == 4) {
                    d.innerHTML = connection.responseText;
                }
            }

            execute(connection, 'GET', './load.php');
        }

        window.onload = LoadUsers();
    </script>

</body>

</html>