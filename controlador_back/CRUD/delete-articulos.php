<?php 

require("../config/conexion.php");

$id = $_GET['id'];


$sql = "DELETE FROM articulos WHERE prod_id = '$id'";
$result = mysqli_query($conexion, $sql);


if($result){
    echo "<script>
    alert('Se eliminó un articulo');
    window.location.href = '../admin/tables.php';
    </script>";
} else {
    echo "<script>
    alert('Ha ocurrido un error, intentalo otra vez');
    window.location.href = '../admin/tables.php';
    </script>";
};

?>