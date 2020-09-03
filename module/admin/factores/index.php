<?php
$backRoot = '../../../';
require $backRoot . 'vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sysurvey - Admin</title>
    <?php include_once $backRoot . "module/common/cdn-css.php"; ?>
    <link rel="stylesheet" href="../../../public/css/estilos_base.css">

</head>

<body class="container">
    <?php
    include_once $backRoot . "module/admin/nav.php";
    $listafactores = Sysurvey\Factores::getFactores();
    ?>

    <header style="display:flex;justify-content: space-between;">
        <h3>Ver Factores</h3>
        <button type="button" class="btn btn-success" style="width:5em;">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
        </button>
    </header>

    <?php
    $grid = new Sysurvey\Modules\Common\GridList\GridList;
    $grid->TableClass = "table";
    $grid->ListColumns = ["head 0", "head 1", "none"];
    $grid->SelectColumn = true;

    $grid->DataCollection = [
        ["id" => 1, "head 0" => "hola 0", "head 1" => "bye 0", "none" => "not null"],
        ["id" => 2, "head 0" => "hola 1", "head 1" => "bye 1"]
    ];
    $grid->KeyColumn = "id";

    $grid->drawComponent();

    ?>

</body>
<?php include_once $backRoot . "module/common/cdn-js.php"; ?>

</html>