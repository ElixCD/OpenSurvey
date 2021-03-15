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
                                <h4 class="card-title ">Nueva rúbrica</h4>
                                <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                            </div>
                            <div class="card-body">
                                <form method="POST" action="">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating">Nombre de la rúbrica</label>
                                                <input type="text" class="form-control" name="rubricname" id="rubricname">
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating">Valor de rúbrica</label>
                                                <input type="text" class="form-control" name="value" id="value">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="reset" class="btn btn-secondary" onclick="location.href = document.referrer;">Cancelar</button>
                                            <button type="submit" class="btn btn-primary" onclick="javascript: location.href = document.referrer;">Guardar</button>
                                        </div>
                                    </div>

                                </form>
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