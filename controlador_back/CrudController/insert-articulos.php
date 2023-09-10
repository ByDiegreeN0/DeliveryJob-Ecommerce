<?php

require_once("../../modelo_db/Models/autoload.php");


$Products = new ProductsClass;


$foto = $_FILES['file']['name'];
$TmpFoto = $_FILES['file']['tmp_name'];
$img = '../../vista_front/img/Products/'.$tmpFoto;

move_uploaded_file($ruta, $conexion);

$name = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$estado = $_POST['estado']; 


if($Products->CreateProducts($img, $name, $desc, $price, $stock, $estado)){
    echo "<script>
    alert('Se ha ingresado un producto con exito')
    window.location.href = '../../vista_front/admin/products.php';
    </script>";
} else {
    echo "<script>
    alert('Ha ocurrido un error, intentalo otra vez')
    window.location.href = '../../vista_front/admin/products.php';
    </script>";
}





?>
