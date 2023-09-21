<?php

require("../modelo_db/Models/autoload.php");

session_start();
$current_session = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

if ($current_session !== null && isset($current_session['user_id'])) {
    $user_id = $current_session['user_id'];
}

$ConnectionDB = new DatabaseConnection();
$Connect = $ConnectionDB->connectDB();

$Products = new ProductsClass;
$Products = $Products->GetProducts();
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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="styles/styles.css">

    <script src="script/scrollreveal.js"></script>

    <link rel="icon" href="img/Icon/DeliveryJob.ico">

    <title>DeliveryJob | Catalogo</title>
</head>

<body class="body">

    <div class="responsive-nav-container">
        <nav class="responsive-nav">
            <ul class="responsive-nav-ul" id="responsive-nav-ul">
                <li> <a href="index.php">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <h3 class="responsive-h3">Inicio</h3>
                    </a>
                </li>

                <li>
                    <a href="catalogo.php">
                        <span class="material-symbols-outlined">
                            storefront
                        </span>
                        <h3 class="responsive-h3">Catálogo</h3>
                    </a>
                </li>

                <li>

                    <a href="index.php#aboutUs">
                        <span class="material-symbols-outlined">
                            chat
                        </span>
                        <h3 class="responsive-h3">Sobre Nosotros</h3>
                    </a>
                </li>



                <li>
                    <a href="index.php#contacto">
                        <span class="material-symbols-outlined">
                            contact_mail
                        </span>
                        <h3 class="responsive-h3">Contacto</h3>
                    </a>
                </li>

                <?php if (empty($current_session)) { ?>
                    <li>
                        <a href="register.html">
                            <span class="material-symbols-outlined">
                                how_to_reg
                            </span>
                            <h3 class="responsive-h3">Registrarse</h3>
                        </a>
                    </li>

                    <li>
                        <a href="login.html">
                            <span class="material-symbols-outlined">
                                login
                            </span>
                            <h3 class="responsive-h3">Iniciar Sesión</h3>
                        </a>
                    </li>
                <?php } else { ?>

                    <li>
                        <a href="users/cart.php?userid=<?php echo $user_id ?>">
                            <span class="material-symbols-outlined">
                                shopping_cart
                            </span>
                            <h3 class="responsive-h3">Carrito de compras</h3>
                        </a>
                    </li>


                    <li>
                        <a href="users/user.php?userid=<?php echo $user_id ?>">
                            <span class="material-symbols-outlined">
                                account_circle
                            </span>
                            <h3 class="responsive-h3">Cuenta</h3>
                        </a>
                    </li>

                <?php } ?>
            </ul>

            <div class="responsive-nav-burger" id="responsive-nav-burger">
                <span class="material-symbols-outlined">
                    menu
                </span>
            </div>
        </nav>
    </div>

    <div class="nav-container">
        <nav class="nav">

            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="catalogo.php">Catalogo</a></li>
                <li><a href="index.php#aboutUs">Sobre Nosotros</a></li>
                <li><a href="index.php#contacto">Contacto</a></li>
            </ul>

            <div class="nav-button-container">
                <?php if (empty($current_session)) { ?>

                    <a href="register.html"><button class="nav-button">Registrarse</button></a>
                    <a href="login.html"><button class="nav-button button-login">Iniciar Sesión</button></a>

                <?php } else { ?>
                    <div class="nav-user-container">

                        <div class="nav-cart">
                            <a href="users/cart.php?userid=<?php echo $user_id ?>">
                                <span class="material-symbols-outlined">
                                    shopping_cart
                                </span>
                            </a>
                        </div>

                        <div class="nav-user">

                            <div class="nav-user-img">
                                <img src="img/body/user.png" alt="">
                            </div>

                            <div class="nav-user-dropdown">

                                <div class="nav-user-dropdown-content">
                                    <a href="users/user.php?userid=<?php echo $user_id ?>">Configuración</a>

                                </div>

                                <div class="nav-user-dropdown-content">
                                    <a href="../controlador_back/config/user-logout.php">Cerrar Sesión</a>
                                </div>
                            </div>

                        </div>
                    </div>





                <?php } ?>


            </div>
        </nav>
    </div>

    <div class="main-img">
        <img src="img/body/main.jfif" alt="">
    </div>



    <div class="main-catalogo">

        <?php if ($Products) {
            foreach ($Products as $row) { ?>
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
            <?php  }
        } else { ?>

            <div class="error-message">
                <span class="material-symbols-outlined sad-icon">
                    sentiment_sad
                </span>
                <h3 class="error-message-h3">En estos momentos no hay productos disponibles, intentalo mas tarde.</h3>
            </div>

        <?php } ?>

    </div>


    <div class="footer-container">
        <footer class="footer">
            <div class="footer-p-container">
                <p class="footer-p"><b>Copyright:</b> Todos los derechos reservados</p>
            </div>

        </footer>

    </div>



    <script src="script/responsive-nav.js"></script>
    <script src="script/main.js"></script>

</body>

</html>