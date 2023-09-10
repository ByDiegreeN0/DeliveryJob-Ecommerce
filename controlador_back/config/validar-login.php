<?php 
require_once("../../modelo_db/Models/autoload.php");

$ConnectionDB = new DatabaseConnection();
$Connect = $ConnectionDB->connectDB();


// VARIABLES

$AdminName = $_POST['name'];
$AdminPassword = $_POST['password'];

// SQL

$sql = "SELECT * FROM tbl_admin WHERE admin_username = '$AdminName' and admin_password = '$AdminPassword'";
$result = mysqli_query($Connect, $sql);
$row = mysqli_num_rows($result);

if ($row >0) {
    echo "<script>
    window.location.href = '../../vista_front/admin/dashboard.php'
    </script>";
}else {
    echo "<script>
    window.location.href = '../../vista_front/admin/login.html'
    alert('Credenciales ingresadas incorrectas, intentalo otra vez');
    </script>";
};

session_start();
$_SESSION['administrador'] = $AdminName;






?>

