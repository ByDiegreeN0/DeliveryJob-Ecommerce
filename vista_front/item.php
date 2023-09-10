<?php

require("../modelo_db/Models/autoload.php");


$ConnectionDB = new DatabaseConnection();
$Connect = $ConnectionDB->connectDB();

$ProdID = $_GET['id'];




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/styles.css">

    <script src="script/scrollreveal.js"></script>

    <link rel="icon" href="img/Icon/DeliveryJob.ico">

    <title>DeliveryJob | Productos</title>
</head>

<body class="body">

    <div class="nav-container">
        <nav class="nav">
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="catalogo.php">Catalogo</a></li>
                <li><a href="index.html#aboutUs">Sobre Nosotros</a></li>
                <li><a href="index.html#contacto">Contacto</a></li>
            </ul>

            <div class="nav-button-container">
                <a href="register.html"><button class="nav-button">Registrarse</button></a>
                <a href="login.html"><button class="nav-button button-login">Iniciar Sesión</button></a>
            </div>
        </nav>
    </div>

    <div class="item-container">
        <div class="img-container">
            <img src="img/body/main.jfif" alt="">
        </div>

        <?php foreach ($Connect->query("SELECT * FROM tbl_products WHERE prod_id = $ProdID") as $row) { ?>
            <div class="item-content">

                <h1 class="item-content-h1"><?php echo $row['prod_name'] ?></h1>
                <p class="item-content-p"><?php echo $row['prod_desc'] ?></p>
                <div class="item-price">
                    <h4>$<?php echo $row['prod_price'] ?></h4>
                </div>
                <div class="catalogo-item-button-container">
                    <a href=""><button class="catalogo-item-button catalogo-item-button-edit">Comprar Ahora</button></a>
                </div>


                <div class="catalogo-item-button-container">
                    <a href=""><button class="catalogo-item-button catalogo-item-button-edit-2">Agregar al Carrito</button></a>
                </div>
            <?php  } ?>

            </div>
    </div>


    <div class="main-sec">

    </div>

    <div class="footer-container">
        <footer class="footer">
            <div class="footer-box">
                <ul>
                    <li><a href="">Politica de devolución</a></li>
                    <li><a href="">Terminos y condiciones</a></li>
                    <li><a href="">Trabaja con nosotros</a></li>
                    <li><a href="">Preguntas frecuentes</a></li>
                </ul>
            </div>

            <div class="footer-box">
                <ul>
                    <li><a href="">Compras al por mayor</a></li>
                    <li><a href="">Sucursales</a></li>
                    <li><a href="">Servicio al cliente</a></li>
                </ul>
            </div>


        </footer>
        <div class="footer-p-container">
            <p class="footer-p"><b>Copyright:</b> Todos los derechos reservados</p>
        </div>
    </div>



    <script src="script/main.js"></script>

</body>

</html>