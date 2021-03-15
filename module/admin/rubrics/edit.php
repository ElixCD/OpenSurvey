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
    <div class="wrapper ">
        <?php
        include_once "../admin-nav.php";
        ?>
        <div class="main-panel">
            <?php
            include_once "../bread-nav.php";
            ?>
            <div class="content" id="main">

                <form>
                    <div class="row">

                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Nombre de la rúbrica</label>
                                <input type="text" class="form-control" name="surveyname" id="surveyname">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a href="newvalue.html" class="btn btn-success">Agregar</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Valor</th>
                                        <th>Acción</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Si</td>
                                            <td>5</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-fab btn-fab-mini btn-link" title="Editar">
                                                    <span class="material-icons">create</span>
                                                </a>
                                                <a href="" class="btn btn-danger btn-fab btn-fab-mini btn-link" title="Eliminar">
                                                    <span class="material-icons">delete</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>No</td>
                                            <td>0</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-fab btn-fab-mini btn-link" title="Editar">
                                                    <span class="material-icons">create</span>
                                                </a>
                                                <a href="" class="btn btn-danger btn-fab btn-fab-mini btn-link" title="Eliminar">
                                                    <span class="material-icons">delete</span>
                                                </a>
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
    <?php
    include_once "../../common/register-js.php";
    ?>
</body>

</html>