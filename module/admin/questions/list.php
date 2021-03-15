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
            </div>
        </div>
    </div>
    <?php
    include_once "../../common/register-js.php";
    ?>
</body>

</html>