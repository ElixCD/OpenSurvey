<?php
require __DIR__ . '/vendor/autoload.php';
OurVoice\SesionStatus::startSession();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OurVoice</title>
    <?php include_once "./module/common/register-css.php"; ?>
</head>

<body class="container">
    <a href="module/admin">Admin</a>
    <a href="module/user">User</a>

    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-header text-center">
                Login
            </div>
            <div class="card-body">
                <form method="POST" action="" name="sign-in">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control"  pattern="[a-zA-Z0-9]+" required >
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="text" id="pass" name="pass" class="form-control" required>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center text-muted">
                <small>
                    Elix Froylán Castillo Durán
                    <br />
                    Copyleft&copy; 2021
                </small>

            </div>
        </div>

    </div>

</body>
<?php include_once "./module/common/register-js.php"; ?>

</html>