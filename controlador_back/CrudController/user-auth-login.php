<?php
require_once("../../modelo_db/Models/autoload.php");

$Users = new UsersClass;

$email = $_POST['email'];
$pass = $_POST['pass'];

$storedPassword = obtenerPasswordDesdeLaBaseDeDatos($email);

if (password_verify($pass, $storedPassword)) {
    session_start();

    $UserData = $Users->GetUserDataByEmail($email);
    if ($UserData) {
        $_SESSION['usuario'] = $UserData;
        $_SESSION['carrito'][$email] = [];
        echo "<script>
            window.location.href = '../../vista_front/index.php'
        </script>";
    } else {
        echo "Error al obtener datos del usuario";
    }
} else {
    echo "Autenticación fallida";
}


function obtenerPasswordDesdeLaBaseDeDatos($email) {
    $conexion = new mysqli("localhost", "root", "", "db_store");

    $consulta = $conexion->prepare("SELECT user_password FROM tbl_users WHERE user_email = ?");
    $consulta->bind_param("s", $email);

    $consulta->execute();
    $consulta->bind_result($password);
    $consulta->fetch();
    $consulta->close();

    $conexion->close();

    return $password;
}
?>

