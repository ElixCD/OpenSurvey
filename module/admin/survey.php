<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <?php
    include_once "../common/register-css.php";
    ?>

</head>

<body>
    <div class="wrapper ">
        <?php
        include_once "admin-nav.php";
        ?>
        <div class="main-panel">
            <?php
            echo $_SERVER["HTTP_HOST"] . "<br>";
            echo $_SERVER["REQUEST_URI"] . "<br>";
            echo $_SERVER["PHP_SELF"] . "<br>";
            echo $_SERVER["SERVER_NAME"] . "<br>";
            echo $_SERVER['SCRIPT_NAME'] . "<br>";
            ?>

        </div>
    </div>
</body>

</html>