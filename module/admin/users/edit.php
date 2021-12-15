<?php
require '../../../vendor/autoload.php';
include_once "../../common/getPath.php";

use Domain\UserDomain;
use Domain\RolDomain;

$idUser = $_GET['id'];

$dbUser = new UserDomain();
$dbRol = new RolDomain();

$user = $dbUser->getUserData($idUser);
$roles = $dbRol->getRoles();

$filtro = function ($array) {
    return ($array['description'] == "Super" ? false : true);
};

$roles = array_filter($roles, $filtro);

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
                        <h4 class="card-title ">Editar usuario</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <h3>Datos</h3>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Nombre del usuario</label>
                                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $user['name']; ?>">
                                        <input type="hidden" name="id" id="id" value="<?php echo $idUser; ?>" />
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Correo</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $user['email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class=" bmd-label-floating">Tipo de Usuario</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" name="idrol" id="idrol">
                                            <option value="">-- Seleccione un tipo de usuario --</option>
                                            <?php
                                            foreach ($roles as $key => $rol) :
                                            ?>
                                                <option value="<?php echo $rol['idrol']; ?>" <?php echo (isset($user['roles']) && (count($user['roles']) > 0) && ($user['roles'][0]['idrol'] == $rol['idrol']) ? "selected" : ""); ?>>
                                                    <?php echo $rol['description']; ?>
                                                </option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="active" class="form-check-input" type="checkbox" value="" <?php echo ($user['active'] == true ? "checked" : ""); ?>>
                                            Activo
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Encuestas creadas</h3>
                                    <hr />
                                </div>

                                <!-- <div class="col-12 text-right mb-2">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                                        <span class="material-icons">add_circle_outline</span>
                                        <span class="btn-single-icon">Agregar</span>
                                    </button>
                                </div> -->

                                <div class="col-md-12">
                                    <?php include "./surveys/load.php" ?>
                                </div>

                                <div class="col-md-12 text-end">
                                    <button type="reset" class="btn btn-secondary" onclick="location.href = document.referrer;">Cancelar</button>
                                    <button type="button" class="btn btn-primary" onclick="Save('update');">Guardar</button>
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
        function Save(action) {
            let name = document.getElementById('username').value;
            let email = document.getElementById('email').value;
            let idrol = document.getElementById('idrol').value;
            let active = document.getElementById('active').checked ? 1 : 0;

            SaveUser(action, name, email, active, idrol, '../../common/actionModels/save-user.php', document.referrer, <?php echo $idUser; ?>);
        }
    </script>

</body>

</html>