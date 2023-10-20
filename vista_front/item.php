<?php

require("../modelo_db/Models/autoload.php");

session_start();
$current_session = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

if ($current_session !== null && isset($current_session['user_id'])) {
    $user_id = $current_session['user_id'];
}



$Products = new ProductsClass;

    $ProdID = $_GET['id'];




$ProductsList = $Products->GetProductsById($ProdID);
$RandomProducts = $Products->GetProductsLimit();



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

    <title>DeliveryJob | Productos</title>
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

    <?php if($ProductsList){
        foreach($ProductsList as $Product){ ?>

        <div class="item-container">
            <div class="img-container">
                <img src="<?php echo substr($Product['prod_img'], 18); ?>" alt="<?php echo $Product['prod_name'] ?>">
            </div>

            <div class="item-content">

                <h1 class="item-content-h1"><?php echo $Product['prod_name'] ?></h1>
                <p class="item-content-p"><b>Descripción: <br><br></b><?php echo $Product['prod_desc'] ?></p>
                <div class="item-price">
                    <h4><b>Precio:</b><br>$<?php echo $Product['prod_price'] ?></h4>
                    <h4><b>Stock:</b><br><?php echo $Product['prod_stock'] ?></h4>
                </div>

                <div class="catalogo-item-details-button-container">
                    <div class="catalogo-item-details-content">
                        <a href=""><button class="catalogo-item-button catalogo-item-button-edit">Comprar Ahora</button></a>

                    </div>

                    <div class="catalogo-item-details-content">
                        <form action="">
                            <input type="hidden" name="id" value="<?php echo $Product['prod_id'] ?>">
                            <input class="catalogo-item-button catalogo-item-button-submit" type="submit" value="Agregar al carrito" required>
                            <input class="catalogo-item-button-form" type="number" name="cantidad" id="" required placeholder="cantidad" value="1">
                        </form>
                    </div>

                </div>




            </div>
        <?php  }} ?>

        </div>

        <div class="main-catalogo">
            <?php if($RandomProducts){
                foreach ($RandomProducts as $RandomProduct){ ?>
                <div class="catalogo-item catalogo-item-details">
                    <div class="catalogo-item-img">
                        <img src="<?php echo substr($RandomProduct['prod_img'], 18); ?>" alt="<?php echo $RandomProduct['prod_name'] ?>">
                    </div>
                    <h2 class="catalogo-item-tittle"><?php echo $RandomProduct['prod_name'] ?></h2>
                    <p class="catalogo-item-price"><?php echo $RandomProduct['prod_price'] ?></p>
                    <div class="catalogo-item-button-container">
                        <a href="item.php?id=<?php echo number_format($RandomProduct['prod_id'], 2, ".", ",") ?>"><button class="catalogo-item-button">Ver Producto</button></a>
                    </div>
                </div>
            <?php }} ?>

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


        <!-- PAYPAL -->

        <script src="https://www.paypal.com/sdk/js?client-id=AZIc00LDVzcRH9EzRJ40xlwDAxMzcVyS8IbF_amFVSxsM8LtPxjEtquUCli3WjuCZxJSpquc6WjryjAa"></script>

        <script>
            // Render the PayPal button into #paypal-button-container
            paypal.Buttons({
                style: {
                    layout: 'horizontal'
                },

                // Call your server to set up the transaction
                createOrder: function(data, actions) {
                    return fetch('/demo/checkout/api/paypal/order/create/', {
                        method: 'post'
                    }).then(function(res) {
                        return res.json();
                    }).then(function(orderData) {
                        return orderData.id;
                    });
                },

                // Call your server to finalize the transaction
                onApprove: function(data, actions) {
                    return fetch('/demo/checkout/api/paypal/order/' + data.orderID + '/capture/', {
                        method: 'post'
                    }).then(function(res) {
                        return res.json();
                    }).then(function(orderData) {
                        // Three cases to handle:
                        //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                        //   (2) Other non-recoverable errors -> Show a failure message
                        //   (3) Successful transaction -> Show confirmation or thank you

                        // This example reads a v2/checkout/orders capture response, propagated from the server
                        // You could use a different API or structure for your 'orderData'
                        var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                        if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                            return actions.restart(); // Recoverable state, per:
                            // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                        }

                        if (errorDetail) {
                            var msg = 'Sorry, your transaction could not be processed.';
                            if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                            if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                            return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                        }

                        // Successful capture! For demo purposes:
                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                        var transaction = orderData.purchase_units[0].payments.captures[0];
                        alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                        // Replace the above to show a success message within this page, e.g.
                        // const element = document.getElementById('paypal-button-container');
                        // element.innerHTML = '';
                        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                        // Or go to another URL:  actions.redirect('thank_you.html');
                    });
                }
            }).render('#paypal-button-container');
        </script>

        <div id="paypal-button-container"></div>

        <script src="path/to/chartjs/dist/chart.umd.js"></script>




</body>

</html>