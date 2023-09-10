<?php

require("../modelo_db/Models/autoload.php");

$ConnectionDB = new DatabaseConnection();
$Connect = $ConnectionDB->connectDB();

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

    <title>DeliveryJob | Catalogo</title>
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
    <div class="main-img">
        <img src="img/body/main.jfif" alt="">
    </div>



    <div class="main-catalogo">
        <?php foreach ($Connect->query("SELECT * FROM tbl_products") as $row) { ?>
            <div class="catalogo-item">
                <div class="catalogo-item-img">
                    <img src="img/body/tenis.webp" alt="">
                </div>
                <h2 class="catalogo-item-tittle"><?php echo $row['prod_name'] ?></h2>
                <p class="catalogo-item-price"><?php echo $row['prod_price'] ?></p>
                <div class="catalogo-item-button-container">
                    <a href="item.php?id=<?php echo number_format($row['prod_id'], 2, ".", ",") ?>"><button class="catalogo-item-button">Ver Producto</button></a>
                </div>
            </div>
        <?php  } ?>

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