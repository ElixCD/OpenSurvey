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
                <a class="btn btn-primary" href="./new.php">Nuevo usuario</a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Usuarios registrados</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark text-primary">
                                    <th class="text-center">
                                        ID
                                    </th>
                                    <th class="text-center">
                                        Nombre
                                    </th>
                                    <th class="text-center">
                                        Correo
                                    </th>
                                    <th class="text-center">
                                        Activo
                                    </th>
                                    <th class="text-center">
                                        Accion
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            1
                                        </td>
                                        <td>
                                            Dakota Rice sgserger tgj gdfgdf dfghdf
                                        </td>
                                        <td>
                                            asdfasd@zxcv.com
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check disabled">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" checked disabled>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-primary" href="./edit.php">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            2
                                        </td>
                                        <td>
                                            Minerva Hooper gh gdfdfgh ght retyer bghrtert
                                        </td>
                                        <td>
                                            assd@zxcv.com
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check disabled">
                                                <label class="form-check-label" for="active">
                                                    <input type="checkbox" id="active" class="form-check-input" disabled>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-primary" href="./edit.php">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            3
                                        </td>
                                        <td>
                                            Sage Rodriguez
                                        </td>
                                        <td>
                                            asdfasfghjfgh.fghfgd@zxcv.com
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check disabled">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" checked disabled>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-primary" href="./edit.php">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            4
                                        </td>
                                        <td>
                                            Philip Chaney
                                        </td>
                                        <td>
                                            asdfahfgjfy_sd@zxcv.com
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check disabled">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" disabled>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-primary" href="./edit.php">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            5
                                        </td>
                                        <td>
                                            Doris Greene
                                        </td>
                                        <td>
                                            asdfdfasd@zxcv.com.es
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check disabled">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" disabled>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-primary" href="./edit.php">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            6
                                        </td>
                                        <td>
                                            Mason Porter
                                        </td>
                                        <td>
                                            asdfasdfgsdfgsd@zxcv.com
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check disabled">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" checked disabled>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-primary" href="./edit.php">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger">
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