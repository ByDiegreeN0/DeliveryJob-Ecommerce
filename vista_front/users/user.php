<?php

require_once("../../modelo_db/Models/autoload.php");

session_start();
$current_session = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

if ($current_session !== null && isset($current_session['user_id'])) {
    $user_id = $current_session['user_id'];
} else {
    echo "
    <script>
        window.location.href = '../login.html';
        alert('No has iniciado sesión, inica sesión o crea una cuenta para usar esta funcion');
    </script>
    ";
}

$Users = new UsersClass;
$Users = $Users->GetUserDataByID($_GET['userid']);

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

    <link rel="stylesheet" href="../styles/styles.css">


    <link rel="icon" href="../img/Icon/DeliveryJob.ico">

    <script src="script/scrollreveal.js"></script>

    <title>DeliveryJob | Datos Personales</title>
</head>

<body class="body">

<div class="responsive-nav-container">
        <nav class="responsive-nav">
            <ul class="responsive-nav-ul" id="responsive-nav-ul">
                <li> <a href="../index.php">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <h3 class="responsive-h3">Inicio</h3>
                    </a>
                </li>

                <li>
                    <a href="../catalogo.php">
                        <span class="material-symbols-outlined">
                            storefront
                        </span>
                        <h3 class="responsive-h3">Catálogo</h3>
                    </a>
                </li>

                <li>

                    <a href="../index.php#aboutUs">
                        <span class="material-symbols-outlined">
                            chat
                        </span>
                        <h3 class="responsive-h3">Sobre Nosotros</h3>
                    </a>
                </li>



                <li>
                    <a href="../index.php#contacto">
                        <span class="material-symbols-outlined">
                            contact_mail
                        </span>
                        <h3 class="responsive-h3">Contacto</h3>
                    </a>
                </li>

                <?php if (empty($current_session)) { ?>
                    <li>
                        <a href="../register.html">
                            <span class="material-symbols-outlined">
                                how_to_reg
                            </span>
                            <h3 class="responsive-h3">Registrarse</h3>
                        </a>
                    </li>

                    <li>
                        <a href="../login.html">
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
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="../catalogo.php">Catalogo</a></li>
                <li><a href="../index.php#aboutUs">Sobre Nosotros</a></li>
                <li><a href="../index.php#contacto">Contacto</a></li>
            </ul>

            <div class="nav-button-container">
                <?php if (empty($current_session)) { ?>

                    <a href="register.html"><button class="nav-button">Registrarse</button></a>
                    <a href="login.html"><button class="nav-button button-login">Iniciar Sesión</button></a>

                <?php } else { ?>
                    <div class="nav-user-container">

                        <div class="nav-cart">
                            <a href="cart.php?userid=<?php echo $user_id ?>">
                                <span class="material-symbols-outlined">
                                    shopping_cart
                                </span>
                            </a>
                        </div>

                        <div class="nav-user">

                            <div class="nav-user-img">
                                <img src="../img/body/user.png" alt="">
                            </div>

                            <div class="nav-user-dropdown">

                                <div class="nav-user-dropdown-content">
                                    <a href="user.php?userid=<?php echo $user_id ?>">Configuración</a>

                                </div>

                                <div class="nav-user-dropdown-content">
                                    <a href="../../controlador_back/config/user-logout.php">Cerrar Sesión</a>
                                </div>
                            </div>

                        </div>
                    </div>





                <?php } ?>


            </div>
        </nav>
    </div>

    <section class="edit-container">
        <h1>Editar datos personales</h1>

        <?php if($Users){
            foreach($Users as $row){;
         ?>
        <form action="" class="edit-form" method="POST">

            <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>" required>

            <div class="edit-container-box">
                <label for="ident">DNI
                    <input class="form-control" type="number" name="ident" id="" placeholder="Ingrese su DNI" required value="<?php echo $row['user_ident']; ?>">
                </label>

                <label for="username">Nombre de Usuario
                    <input class="form-control" type="text" name="username" id="" placeholder="Ingrese su nuevo nombre de usuario" required value="<?php echo $row['user_username']; ?>">
                </label>

                <label for="realname">Nombre Real
                    <input class="form-control" type="text" name="realname" id="" placeholder="Ingrese su nombre real" required value="<?php echo $row['user_realname']; ?>">
                </label>
            </div>

            <div class="edit-container-box">
                <label for="email">Correo Electronico
                    <input class="form-control" type="email" name="email" id="" placeholder="Ingrese su correo electronico" required value="<?php echo $row['user_email']; ?>">
                </label>

                <label for="phonenumber">Número de teléfono
                    <input class="form-control" type="number" name="phonenumberr" id="" placeholder="Número de teléfono" required value="<?php echo $row['user_phonenumber']; ?>">
                </label>
            </div>


            <label for="pass">Contraseña
                <input class="form-control" type="password" name="pass" id="" placeholder="Ingrese su nueva contraseña" required>
            </label>

            <label for="address">Dirección
                <input class="form-control" type="text" name="address" id="" placeholder="Ingrese su dirección" required value="<?php echo $row['user_address']; ?>">
            </label>

            <div class="form-submit-container">
                <input class="form-submit" type="submit" value="Guardar Cambios">
            </div>
        </form>

        <?php }} ?>
    </section>


    <div class="footer-container">
        <footer class="footer">
            <div class="footer-p-container">
                <p class="footer-p"><b>Copyright:</b> Todos los derechos reservados</p>
            </div>

        </footer>

    </div>


    <script src="../script/main.js"></script>
    <script src="../script/responsive-nav.js"></script>

</body>

</html>