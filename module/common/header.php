<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="">
    <div class="fixed-top">
        <div id="nav-head" class=" d-flex bg-dark ">
            <div id="mostrar-nav">
                <i class="material-icons" onclick="toggle()">menu</i>
            </div>
            <div class="logo me-auto">OurVoice Survey System</div>

            <div class="logo d-none d-sm-block mr-2">
                <p class="text-end"><?php echo $_SESSION['user']['name']; ?></p>
            </div>

        </div>
        <?php
        include_once "../bread-nav.php";
        ?>

    </div>
</header>