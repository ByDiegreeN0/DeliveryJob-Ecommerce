<?php

session_start();
$current_session = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

if ($current_session !== null && isset($current_session['user_id'])) {
    $user_id = $current_session['user_id'];
}


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

    <link rel="icon" href="img/Icon/DeliveryJob.ico">

    <script src="script/scrollreveal.js"></script>
    <title>DeliveryJob | Inicio</title>
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

                    <a href="#aboutUs">
                        <span class="material-symbols-outlined">
                            chat
                        </span>
                        <h3 class="responsive-h3">Sobre Nosotros</h3>
                    </a>
                </li>



                <li>
                    <a href="#contacto">
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
                <li><a href="#aboutUs">Sobre Nosotros</a></li>
                <li><a href="#contacto">Contacto</a></li>
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


    <div class="main-sec">

        <div class="main-sec-img">
            <img src="img/body/tenis.webp" alt="" class="main-sec-img-content">
        </div>

        <div class="main-sec-paragraph">

            <h1 class="main-sec-h1">DeliveryJob</h1>
            <p class="main-sec-p">Somos una tienda de zapatos de toda clase, de excelente calidad, muy buen diseño,
                ergonomía y demás elementos importantes para demarcar la calidad de nuestros productos, ¿Quieres saber
                más?, dale click al boton de abajo <br><br>Hacemos envios a todo el mundo. </p>
            <div class="main-sec-button-container">
                <a id="aboutUs" href="catalogo.php"><button>Ver Catálogo</button></a>
            </div>
        </div>
    </div>

    <div class="about-us-container">

        <div class="about-us-box">
            <h3>¿Donde estamos ubicados?</h3>
            <P>En este momento no contamos con tiendas fisicas en el país, pero aun asi, realizamos envios a todo el
                territorio nacional</P>
        </div>

        <div class="about-us-box">
            <h3>¿Cuales son nuestros metodos de pago?</h3>
            <p id="contacto">Tenemos una gran cantidad de metodos de pago
            <ul>
                <li>Nequi</li>
                <li>Daviplata</li>
                <li>PayPal</li>
                <li>Tarjeta de Débito/Crédito</li>
            </ul>
            </p>
        </div>

    </div>

    <div class="divider"></div>

    <div class="contact-container">
        <h4 class="contact-container-h4">Formulario de Contacto</h4>
        <form action="../controlador_back/CrudController/insert-mensajes.php" method="POST" class="contact-container-form">
            <label for="name">Nombre
                <input name="name" type="text" class="form-control" placeholder="Ingrese su nombre">
            </label>

            <label for="asunto">Asunto
                <input name="asunto" type="text" class="form-control" placeholder="Asunto">
            </label>

            <label for="name">Correo
                <input name="email" type="email" class="form-control" placeholder="pepitoperez@email.com">
            </label>

            <label for="mensaje">Mensaje
                <textarea name="mensaje" class="form-control-textarea" id="" cols="30" rows="10" placeholder="Cuentanos, ¿en que te podemos ayudar?"></textarea>
            </label>

            <div class="form-submit-container">
                <input type="submit" class="form-submit" value="Enviar Mensaje">
            </div>
        </form>
    </div>


    <div class="maps-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254508.3947267588!2d-74.27261648633684!3d4.648620627274359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9bfd2da6cb29%3A0x239d635520a33914!2zQm9nb3TDoQ!5e0!3m2!1ses!2sco!4v1693624051725!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="footer-container">
        <footer class="footer">
            <div class="footer-p-container">
                <p class="footer-p"><b>Copyright:</b> Todos los derechos reservados</p>
            </div>

        </footer>

    </div>



    <script src="script/main.js"></script>
    <script src="script/responsive-nav.js"></script>

</body>

</html>