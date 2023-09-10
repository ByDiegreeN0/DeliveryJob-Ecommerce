<?php 

require_once("../../modelo_db/Models/autoload.php");


$Products = new ProductsClass;

$id = $_GET['id'];

if($Products->DeleteProducts($id)){
    echo "<script>
    alert('Se eliminó un articulo');
    window.location.href = '../../vista_front/admin/products.php';
    </script>";
} else {
    echo "<script>
    alert('Ha ocurrido un error, intentalo otra vez');
    window.location.href = '../../vista_front/admin/products.php';
    </script>";
};

?>
