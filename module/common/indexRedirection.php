<?php
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

echo "Location: http://$host - $uri/list.php";

header("Location: http://$host$uri/list.php");
exit;
?>