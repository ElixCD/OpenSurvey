<?php
$backRoot = '../../../';
require $backRoot . 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sysurvey - Admin</title>
    <?php include_once $backRoot . "module/common/cdn-css.php"; ?>
</head>

<body class="container">
    <?php include_once $backRoot . "module/admin/nav.php"; ?>
    <h3>Ver Factores</h3>

    <?php
    $listafactores = Sysurvey\Factores::getFactores();
    ?>

    <table class="table">
        <thead>
            <tr>
                <td>tittle 1</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listafactores as &$value) : ?>
                <tr>
                    <td><?php echo $value; ?></td>
                    <td><?php echo $value; ?></td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

</body>
<?php include_once $backRoot . "module/common/cdn-js.php"; ?>

</html>