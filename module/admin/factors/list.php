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
            <div class="col-md-12 m-2">
                <a class="btn btn-primary" href="./new.php">Nuevo Factor</a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Factores registrados</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Rubrica</th>
                                    <th>Acción</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Verdadero / Falso</td>
                                        <td>Rubrica 1</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-primary" href="./edit.php" title="Editar">
                                                    <i class="material-icons">create</i>
                                                </a>
                                                <a class="btn btn-danger" title="Eliminar">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Cuantitativo</td>
                                        <td>Rubrica 15</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-primary" href="./edit.php" title="Editar">
                                                    <i class="material-icons">create</i>
                                                </a>
                                                <a class="btn btn-danger" title="Eliminar">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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