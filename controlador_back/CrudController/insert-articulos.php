<?php

require_once("../../modelo_db/Models/autoload.php");

$Products = new ProductsClass;

$foto = $_FILES['file']['name'];
$TmpFoto = $_FILES['file']['tmp_name'];
$uploadDir = '../../vista_front/img/Products/';
$img = $uploadDir . $foto;

if (move_uploaded_file($TmpFoto, $img)) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['precio'];
    $stock = $_POST['stock'];

    if ($Products->CreateProducts($img, $name, $desc, $price, $stock)) {
        echo "<script>
        alert('Se ha ingresado un producto con éxito')
        window.location.href = '../../vista_front/admin/products.php';
        </script>";
    } else {
        echo "<script>
        alert('Ha ocurrido un error, inténtalo otra vez')
        window.location.href = '../../vista_front/admin/products.php';
        </script>";
    }
} else {
    echo "<script>
    alert('Error al subir la imagen')
    window.location.href = '../../vista_front/admin/products.php';
    </script>";
}

?>
