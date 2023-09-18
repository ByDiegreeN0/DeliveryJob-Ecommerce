<?php 

session_start();
unset($_SESSION['administrador']);

header("location: ../../vista_front/admin/login.html");


?>