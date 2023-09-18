<?php 

require_once("../../modelo_db/Models/autoload.php");

$cart = new CartClass;

$ProdID = $_POST['prodid'];
$UserID = $_POST['userid'];

if($cart->AddProductsToCart($ProdID, $UserID)){
    echo "funcione";
}else {
    echo "No funcione";
}

?>