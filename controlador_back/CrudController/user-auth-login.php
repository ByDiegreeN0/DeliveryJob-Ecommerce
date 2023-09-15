<?php 

require_once("../../modelo_db/Models/autoload.php");

$Users = new UsersClass;

$email = $_POST['email'];
$password = $_POST['pass'];

?>