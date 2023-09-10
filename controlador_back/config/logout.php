<?php 

session_start();
session_destroy();

header("location: ../../vista_front/admin/login.html");


?>