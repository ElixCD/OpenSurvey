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
                        <h4 class="card-title ">Editar factor</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Nombre del factor</label>
                                        <input type="text" class="form-control" name="factorname" id="factorname" value="Verdadero / Falso">
                                    </div>
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

                                <div class="col-md-12 text-right  pb-2 mb-3 border-bottom">
                                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#rubricModal">Nueva rúbrica</a>
                                </div>

                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class="thead-dark text-primary">
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Valor</th>
                                                <th>Acción</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Verdadero</td>
                                                    <td>5</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="" data-toggle="modal" data-target="#rubricModal" class="btn btn-primary" title="Editar">
                                                                <span class="material-icons">create</span>
                                                            </a>
                                                            <a href="" data-toggle="modal" data-target="#deleteRubricModal" class="btn btn-danger" title="Eliminar">
                                                                <span class="material-icons">delete</span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Falso</td>
                                                    <td>0</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="" data-toggle="modal" data-target="#rubricModal" class="btn btn-primary" title="Editar">
                                                                <span class="material-icons">create</span>
                                                            </a>
                                                            <a href="" data-toggle="modal" data-target="#deleteRubricModal" class="btn btn-danger" title="Eliminar">
                                                                <span class="material-icons">delete</span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="reset" class="btn btn-secondary" onclick="location.href = document.referrer;">Cancelar</button>
                                    <button type="button" class="btn btn-primary" onclick="javascript: location.href = document.referrer;">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Edit -->
    <div class="modal fade" id="rubricModal" tabindex="-1" role="dialog" aria-labelledby="newRubricModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRubricModalTitle">Rúbrica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Nombre de la rúbrica</label>
                                <input type="text" class="form-control" name="rubricname" id="rubricname">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Valor de rúbrica</label>
                                <input type="text" class="form-control" name="value" id="value">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete-->
    <div class="modal fade" id="deleteRubricModal" tabindex="-1" role="dialog" aria-labelledby="deleteRubricModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteRubricModalTitle">Rúbrica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            Se eliminara la rúbrica.
                            <br />
                            ¿Desea continuar?
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once "../../common/register-js.php";
    ?>
</body>

</html>