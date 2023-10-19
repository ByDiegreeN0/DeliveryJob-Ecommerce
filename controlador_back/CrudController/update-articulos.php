<?php 

require_once("../../modelo_db/Models/autoload.php");

$Products = new ProductsClass;




$img = "hola.png";
$name = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$estado = $_POST['estado'];
$id = $_POST['id'];





if($Products->UpdateProducts($id, $img, $name, $desc, $price, $stock, $estado)){
    echo "<script>
    alert('Se actualizaron los articulos correctamente');
    window.location.href = '../../vista_front/admin/products.php';
    </script>";
} else {
    echo "<script>
    alert('Ha ocurrido un error, intentalo otra vez');
    window.location.href = '../../vista_front/admin/products.php';
    </script>";
};




?>