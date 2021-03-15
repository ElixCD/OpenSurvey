<?php
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
                        <h4 class="card-title ">Editar usuario</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Datos</h3>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Nombre del usuario</label>
                                        <input type="text" class="form-control disabled" name="username" id="username" value="Elix Castillo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Correo</label>
                                        <input type="email" class="form-control" name="email" id="email" disabled value="algo@gmail.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Tipo de Usuario</label>
                                        <input type="email" class="form-control" name="tipo-usuario" id="tipo-usuario" value="Administrador">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check disabled">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            Activo
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Encuestas Asignadas</h3>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <div class="table-resposive">
                                        <table class="table table-striped">
                                            <thead class="thead-dark">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Completa</th>
                                                <th class="text-center">Contestar</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">Encuesta 1</td>
                                                    <td class="text-center">Si</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-danger btn-fab btn-fab-mini" title="Eliminar">
                                                            <span class="material-icons">delete</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">Encuesta 2</td>
                                                    <td class="text-center">No</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-danger btn-fab btn-fab-mini" title="Eliminar">
                                                            <span class="material-icons">delete</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="col-md-12 text-right">
                                    <button type="reset" class="btn btn-secondary" onclick="location.href = document.referrer;">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
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
</body>

</html>