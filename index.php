<?php
require __DIR__ . './vendor/autoload.php';
Sysurvey\SesionStatus::startSession();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sysurvey</title>
    <?php include_once "./module/common/cdn-css.php"; ?>
</head>

<body class="container">
    <?php include_once "./module/common/nav.php"; ?>

</body>
<?php include_once "./module/common/cdn-js.php"; ?>

</html>