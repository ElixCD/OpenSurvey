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
                        <h4 class="card-title ">Editar encuesta</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <form class="pb-2 mb-3 border-bottom">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Nombre de encuesta</label>
                                        <input type="text" class="form-control" name="surveyname" id="surveyname" value="Encuesta 1">
                                    </div>
                                    <div class="form-group form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Activo
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-nav-tabs card-plain">
                                    <div class="card-header card-header-primary">
                                        <label class="card-title">Preguntas</label>
                                    </div>
                                    <div class="card-body ">
                                        <div class="col-12 text-right mb-2">
                                            <button class="btn btn-success" data-toggle="modal" data-target="#addModal">
                                                <span class="material-icons">add_circle_outline</span>
                                                <span class="btn-single-icon">Agregar</span>
                                            </button>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead class="thead-dark text-primary">
                                                    <th class="text-center">ID</th>
                                                    <th class="text-center">Pregunta</th>
                                                    <th class="text-center">Factor</th>
                                                    <th class="text-center">Accion</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td>¿Pregunta 1?</td>
                                                        <td class="text-center">Si/No</td>
                                                        <td class="text-center">

                                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal" title="Editar">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteModal" title="Eliminar">
                                                                    <i class="material-icons">delete</i>
                                                                </button>

                                                                <!-- <a class="btn btn-primary" href="./edit.php">
                                                                    <i class="material-icons">edit</i>
                                                                </a>
                                                                <a class="btn btn-danger">
                                                                    <i class="material-icons">delete</i>
                                                                </a> -->
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td>¿Questión numero 2?</td>
                                                        <td class="text-center">Si/No</td>
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal" title="Editar">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteModal" title="Eliminar">
                                                                    <i class="material-icons">delete</i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td>¿Completas la tercera pregunta?</td>
                                                        <td class="text-center">Si/No</td>
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal" title="Editar">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteModal" title="Eliminar">
                                                                    <i class="material-icons">delete</i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">4</td>
                                                        <td>¿Estas seguro de continuar con esta
                                                            cuarta pregunta?</td>
                                                        <td class="text-center">Si/No</td>
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal" title="Editar">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteModal" title="Eliminar">
                                                                    <i class="material-icons">delete</i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">5</td>
                                                        <td>Casí terminamos, ¿Continuamos con la
                                                            quinta pregunta?</td>
                                                        <td class="text-center">Si/No</td>
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal" title="Editar">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteModal" title="Eliminar">
                                                                    <i class="material-icons">delete</i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">6</td>
                                                        <td>Por fin la ultima pregunta. ¿Seguro
                                                            que deseas terminar el cuestionario?
                                                        </td>
                                                        <td class="text-center">Si/No</td>
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal" title="Editar">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteModal" title="Eliminar">
                                                                    <i class="material-icons">delete</i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                <li class="page-item"><a class="page-link" href="#">1</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">2</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">3</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3 text-right">
                                <!-- <button type="reset" class="btn btn-secondary" onclick="location.href = document.referrer;">Cancelar</button> -->
                                <button type="submit" class="btn btn-primary">Volver</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once "../../common/register-js.php";
    ?>

    <!-- Modal add question -->
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
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Reactivo</label>
                                    <input type="text" class="form-control" name="question" id="question">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Nombre de los factores</label>
                                <select class="form-control selectpicker" data-style="btn btn-link" name="factores" id="factores">
                                    <option value=""> -- Seleccione un valor -- </option>
                                    <option value="1" selected>Si/No</option>
                                    <option value="1">Factor 1</option>
                                    <option value="2">Factor 2</option>
                                    <option value="3">Factor 3</option>
                                    <option value="4">Factor 4</option>
                                </select>
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

    <!-- Modal delete question -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle" id="deleteModalLabel">Eliminar reactivo</h5>
                    <button type="button" class="close" data-dismiss="modal" arial-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <h5>Eliminar reactivo</h5>
                        <p>Esta a punto de eliminar un reactivo ¿Esta seguro de continuar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>