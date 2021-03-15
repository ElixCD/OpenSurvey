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
                                        <input type="text" class="form-control" name="username" id="username">
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Correo</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>
                                    <div class="form-group ">
                                        <label class="bmd-label-floating">Tipo de Usuario</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" name="tipo-usuario" id="tipo-usuario">
                                            <option value="">-- Seleccione un tipo de usuario --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
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
                                    <h3>Asignación de Encuestas</h3>
                                    <hr>
                                </div>

                                <div class="col-12 text-right mb-2">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                                        <span class="material-icons">add_circle_outline</span>
                                        <span class="btn-single-icon">Agregar</span>
                                    </button>
                                </div>

                                <div class="col-md-12">
                                    <div class="table-resposive">
                                        <table class="table table-striped">
                                            <thead class="thead-dark">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Completa</th>
                                                <th class="text-center">Eliminar</th>
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

    <!-- Modal asignar/eliminar encuestas al usuario actual -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle" id="addModal">Encuesta</h5>
                    <button type="button" class="close" data-dismiss="modal" arial-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Seleccione las encuestas que se asignarán al usuario actual</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                Sin asignar
                            </div>
                            <div class="col-2">
                            </div>
                            <div class="col-5">
                                Asignados
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group multiselect-picker">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="1">
                                            Si/No
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="2">
                                            Factor 1                                           
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="3">
                                            Factor 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="4">
                                            Factor 4
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 p-1">
                                <div class="form-group pt-4">
                                    <input type="button" class="btn btn-default" value=">>" title="Asignar">
                                    <input type="button" class="btn btn-default" value="<<" title="Eliminar">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group multiselect-picker">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="1">
                                            Si/No
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="2">
                                            Factor 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="3">
                                            Factor 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="4">
                                            Factor 4
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="5">
                                            Factor 5
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="6">
                                            Factor 6
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="7">
                                            Factor 7
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="8">
                                            Factor 8
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="9">
                                            Factor 9
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include_once "../../common/register-js.php";
    ?>

</body>

</html>