
<?php 

require_once("../../modelo_db/Models/autoload.php");

$Users = new UsersClass;

$email = $_POST['email'];
$pass = $_POST['pass'];

// Realiza la autenticación del usuario


if ($Users->UserAuth($email, $pass)) {
    session_start();

    $UserData = $Users->GetUserDataByEmail($email);
    if($UserData){
        $_SESSION['usuario'] = $UserData;
        $_SESSION['carrito'][$email] = [];
    }
    
    echo "<script>
        window.location.href = '../../vista_front/index.php'
    </script>";
   
} else {
    echo "Autenticación fallida";
}
?>


