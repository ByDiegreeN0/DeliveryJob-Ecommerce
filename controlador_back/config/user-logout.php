<?php 

session_start();

unset($_SESSION['usuario']);

header("location: ../../vista_front/index.php");


?>