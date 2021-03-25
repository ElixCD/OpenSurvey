<?php
require '../../../vendor/autoload.php';
include_once "../../common/getPath.php";

use Sysurvey\Db;
use Models\UserType;

$dbUserType = new UserType(new Db());
$userTypes = $dbUserType->getUserTypes(1);

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
                        <h4 class="card-title ">Nuevo usuario</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Nombre del usuario</label>
                                        <input type="text" class="form-control" name="username" id="username">
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Correo</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>
                                    <div class="form-group ">
                                        <label class="bmd-label-floating">Tipo de Usuario</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" name="type-user" id="type-user">
                                            <option value="">-- Seleccione un tipo de usuario --</option>
                                            <?php foreach ($userTypes as $userType) : ?>
                                                <option value="<?php echo $userType['iduser_type']; ?>" ><?php echo $userType['description']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" id="active">
                                            Activo
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" id="asign">
                                            Asignar encuestas
                                        </label>
                                    </div>
                                </div>
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
            backUrl = document.referrer;

            connection = createConnection();

            let name = document.getElementById('username').value;
            let email = document.getElementById('email').value;
            let type = document.getElementById('type-user').value;
            let active = document.getElementById('active').checked;
            let asign = document.getElementById('asign').checked;

            connection.onreadystatechange = function() {
                if (connection.readyState == 4) {
                    let obj = JSON.parse(connection.responseText);
                    alert(obj.msj);
                    if (obj.error == false) {
                        if (asign == true) {
                            location.href = "./edit.php?id=" + obj.opt;
                        } else {
                            location.href = backUrl;
                        }
                    }
                }
            }
            execute(connection, 'POST', './save-user.php', "action=" + action + "&name=" + name + "&email=" + email + "&active=" + active);
        }
    </script>

</body>

</html>