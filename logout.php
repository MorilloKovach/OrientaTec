<?php 

setcookie("username", "", time() - 1000000, "/");
setcookie("password", "", time() - 1000000, "/");
header("Location: inicio.php");
exit();
?>