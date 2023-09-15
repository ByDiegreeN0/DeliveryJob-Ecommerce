<?php 

require_once("../../modelo_db/Models/autoload.php");

$Users = new UsersClass;

$username = $_POST['username'];
$password = $_POST['pass'];
$ident = "No se ha proporcionado una identifiación";
$realname = $_POST['realname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$address = "No se ha proporcionado una dirección";

if($Users->CreateUser($username, $password, $ident, $realname, $email, $phonenumber, $address)){
    echo "<script>
    alert('Ha creado su cuenta correctamente');
    window.location.href = '../../vista_front/login.html';
    </script>";
}else{
    echo "<script>
    alert('Ha ocurrido un error, intentalo mas tarde');
    window.location.href = '../../vista_front/login.html';
    </script>";
}

?>