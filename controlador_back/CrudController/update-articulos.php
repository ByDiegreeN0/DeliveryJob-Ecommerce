<?php 

require_once("../../modelo_db/Models/autoload.php");

$Products = new ProductsClass;


// variables

/* $id = $_POST['id'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['precio'];
$stock = $_POST['stock'];
$estado = $_POST['estado']; */

// ARREGLAR
$img = "img.jpg";
$name = "funcione en el id 2";
$desc = "funcione en el id 2";
$price = 2;
$stock = 2;
$estado = "Inactivo";
$id = 2;


if($Products->UpdateProducts($img, $name, $desc, $price, $stock ,$estado, $id)){
    echo "<script>
    alert('Se actualizaron los articulos correctamente');
    </script>";
} else {
    echo "<script>
    alert('Ha ocurrido un error, intentalo otra vez');
    window.location.href = '../../vista_front/admin/products.php';
    </script>";
};




?>