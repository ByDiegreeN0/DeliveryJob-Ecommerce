<?php 

require("../config/conexion.php");

// variables

$ProdID = $_POST['id'];
$ProdNombre = $_POST['name'];
$ProdDescripcion = $_POST['desc'];
$ProdPrecio = $_POST['precio'];
$ProdStock = $_POST['stock'];
$ProdEstado = $_POST['estado'];

$sql = "UPDATE articulos SET prod_nombre = '$ProdNombre', prod_descripcion = '$ProdDescripcion', prod_precio = '$ProdPrecio', prod_stock = '$ProdStock', prod_estado = '$ProdEstado' WHERE prod_id = '$ProdID' ";
$result = mysqli_query($conexion, $sql);


if($result){
    echo "<script>
    alert('Se actualizaron las cosas correctamente');
    window.location.href = '../admin/tables.php';z
    </script>";
} else {
    echo "<script>
    alert('Ha ocurrido un error, intentalo otra vez');
    window.location.href = '../admin/tables.php';
    </script>";
};




?>