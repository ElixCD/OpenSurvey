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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Selección de factor</h4>
                                <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label>Factor al que pertenece</label>
                                            <select class="form-control selectpicker" data-style="btn btn-link" name="factores" id="factores">
                                                <option value=""> -- Seleccione un valor -- </option>
                                                <option value="0" selected>Si / No</option>
                                                <option value="1">Factor 1</option>
                                                <option value="2">Factor 2</option>
                                                <option value="3">Factor 3</option>
                                                <option value="4">Factor 4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Rúbricas registradas en el factor</h4>
                                <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                            </div>
                            <div class="card-body">

                                <div class="col-md-12 text-right">
                                    <a class="btn btn-primary" href="./new.php">Nueva rúbrica</a>
                                </div>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once "../../common/register-js.php";
    ?>
</body>

</html>