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
                        <h4 class="card-title ">Nuevo factor</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Nombre del factor</label>
                                        <input type="text" class="form-control" name="factorname" id="factorname">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value=""  id="create-rubric">
                                            Crear rúbrica
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="reset" class="btn btn-secondary" onclick="location.href = document.referrer;">Cancelar</button>
                                    <button type="button" class="btn btn-primary" onclick="SaveFactor('new');">Guardar</button>
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
        function SaveFactor(action) {
            if (window.XMLHttpRequest) {
                connection = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                connection = new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            let d = document.getElementById('factorname').value;
            let r = document.getElementById('create-rubric').value;

            connection.onreadystatechange = function (){
                UpdateElement();
                // if(r == true){
                //     location.href = "./edit.php?id="
                // }
            }

            connection.open('POST', './save.php');
            connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            connection.send("action=" + action  + "&d=" + d);
        }
    </script>

</body>

</html>