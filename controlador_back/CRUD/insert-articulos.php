<?php

use Stripe\Product;

require_once("../CRUD/Class/autoload.php");
$products = new Products;

$foto = $_FILES['file']['name'];
$TmpFoto = $_FILES['file']['tmp_name'];
$img = '../../vista_front/img/Products/'.$tmpFoto;

move_uploaded_file($ruta, $conexion);

$name = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$estado = $_POST['estado'];

if($products->CreateProducts($img, $name, $desc, $price, $stock, $estado)){
    echo "<script>
    alert('Se ha ingresado un producto con exito')
    </script>";
} else {
    echo "<script>
    alert('Ha ocurrido un error, intentalo otra vez')
    </script>";
}




/*require("../config/conexion.php");


$foto = $_FILES['file']['name'];
$tmpFoto = $_FILES['file']['tmp_name'];
$ruta = '../../vista_front/img/articulos/'.$tmpFoto;

move_uploaded_file($ruta, $conexion);


$ProdNombre = $_POST['name'];
$ProdDescripcion = $_POST['desc'];
$ProdPrecio = $_POST['precio'];
$ProdStock = $_POST['stock'];
$ProdEstado = $_POST['estado'];

$sql = "INSERT INTO articulos(prod_img, prod_nombre, prod_descripcion, prod_precio, prod_stock, prod_estado) values ('$ruta','$ProdNombre', '$ProdDescripcion', $ProdPrecio, '$ProdStock', '$ProdEstado')";
$result = mysqli_query($conexion, $sql);


if($result){
    echo "<script>
    alert('Se ha insertado un nuevo articulo con exito');
    window.location.href = '../../vista_front/admin/dashboard.php';
    </script>";
} else {
    echo "<script>
    alert('Ha ocurrido un error, intentalo otra vez');
    window.location.href = '../../vista_front/admin/dashboard.php';
    </script>";
}; */








?>