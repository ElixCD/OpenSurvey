<?php
require '../../../vendor/autoload.php';
include_once "../../common/getPath.php";

$user = OurVoice\SesionStatus::GetSessionData("user");

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
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Editar usuario</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Datos</h3>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="activate-data" onclick="activate('form-data');">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Editar
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <form id="form-data" class="col-12">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Nombre del usuario</label>
                                            <input type="text" class="form-control " disabled name="username" id="username" value="<?php echo $user['name']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Correo</label>
                                            <input type="email" class="form-control" disabled name="email" id="email" value="<?php echo $user['email']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Tipo de Usuario</label>
                                            <input type="email" class="form-control" disabled name="tipo-usuario" id="tipo-usuario" value="<?php echo $user['roles'][0]['description']  ?>" readonly>
                                            <input type="hidden" value="<?php echo $user['roles'][0]['idrol']; ?>" id="idrol" name="idrol">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" id="active" name="active" readonly disabled value="" <?php echo ($user['active'] == true ? "checked" : ""); ?>>
                                                Activo
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right d-none" id="btn-data">
                                        <button type="reset" class="btn btn-secondary" onclick="activate('form-data',1);">Cancelar</button>
                                        <button type="button" class="btn btn-primary" value="" onclick="SaveData();">Guardar</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3>Contraseña</h3>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="activate-password" onclick="activate('form-password');">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Editar
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <form id="form-password" class="col-12">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Contraseña</label>
                                            <input type="password" class="form-control" disabled name="password" id="password" value="<?php echo $user['password']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Repetir Contraseña</label>
                                            <input type="password" class="form-control" disabled name="repeat" id="repeat" value="<?php echo $user['password']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right d-none" id="btn-password">
                                        <button type="reset" class="btn btn-secondary" onclick="activate('form-password',1);">Cancelar</button>
                                        <button type="button" class="btn btn-primary" onclick="SavePassword();">Guardar</button>
                                    </div>

                                </div>
                            </form>
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
        function activate(idContainer, e = 0) {
            section = idContainer.split("-")[1];
            btnBox = document.getElementById("btn-" + section);
            if (btnBox.classList.contains("d-none")) {
                btnBox.classList.remove("d-none")
            } else {
                btnBox.classList.add("d-none")
            }

            elem = document.getElementById(idContainer).getElementsByTagName("input");

            for (i = 0; i < elem.length; i++) {
                if (elem[i].getAttribute("type") != "checkbox") {
                    if (elem[i].hasAttribute("disabled")) {
                        elem[i].removeAttribute("disabled")
                    } else {
                        elem[i].setAttribute("disabled", "disabled")
                    }
                }
            }

            if (e == 1) {
                editar = document.getElementById("activate-" + section);
                editar.checked = !editar.checked;
            }
        }

        function SaveData() {
            let name = document.getElementById('username').value;
            let email = document.getElementById('email').value;
            let idrol = document.getElementById('idrol').value;
            let active = document.getElementById('active').checked;

            SaveUser('update', name, email, active, idrol, '../../common/actionModels/save-user.php', null, <?php echo $user['iduser']; ?>);
            activate('form-data', 1);
        }

        function SavePassword() {
            let password = document.getElementById('password').value;
            let repeat = document.getElementById('repeat').value;

            if (password == repeat) {
                // SaveUser(action, name, email, active, idrol, './save-user.php', <?php //echo $idUser; 
                                                                                    ?>);
                activate('form-password', 1);
            } else {
                alert("Las contraseñas no coinciden");
            }

        }
    </script>
</body>

</html>