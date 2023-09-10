<?php
require_once("../../modelo_db/Models/autoload.php");

$ConnectionDB = new DatabaseConnection();
$Connect = $ConnectionDB->connectDB();

session_start();

$current_session = $_SESSION['administrador'];


if ($current_session == null || $current_session == ""){
    header("LOCATION: 403.html");
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="admin_styles/admin_dashboard_styles.css">

    <link rel="icon" href="../../vista_front/img/body/DeliveryJobMain.png">

    <title>Dashboard | Inicio</title>
</head>

<body>

    <div class="responsive-nav-container">
        <nav class="responsive-nav">
            <ul class="responsive-nav-ul" id="responsive-nav-ul">
                <li> <a href="dashboard.php">
                        <span class="material-symbols-outlined">
                            space_dashboard
                        </span>
                        <h3>Dashboard</h3>
                    </a>
                </li>

                <li>
                    <a href="products.php">
                        <span class="material-symbols-outlined">
                            storefront
                        </span>
                        <h3>Productos</h3>
                    </a>
                </li>

                <li>

                    <a  href="message.php">
                        <span class="material-symbols-outlined">
                            chat
                        </span>
                        <h3>Mensajes</h3>
                    </a>
                </li>


                <li>
                    <a  href="admin.php">
                        <span class="material-symbols-outlined">
                            shield_person
                        </span>
                        <h3>Administradores</h3>
                    </a>
                </li>

                <li>
                    <a  href="../../controlador_back/config/logout.php">
                        <span class="material-symbols-outlined">
                            logout
                        </span>
                        <h3>Cerrar Sesión</h3>
                    </a>
                </li>
            </ul>

            <div class="responsive-nav-burger" id="responsive-nav-burger">
                <span class="material-symbols-outlined">
                    menu
                </span>
            </div>
        </nav>
    </div>

    <div class="aside-container">
        <aside class="aside">
            <h1 class="aside-h1">Dashboard</h1>
            <a class="aside-a aside-active" href="dashboard.php">
                <span class="material-symbols-outlined">
                    space_dashboard
                </span>
                <h3>Dashboard</h3>
            </a>

            <a class="aside-a" href="products.php">
                <span class="material-symbols-outlined">
                    storefront
                </span>
                <h3>Productos</h3>
            </a>

            <a class="aside-a" href="message.php">
                <span class="material-symbols-outlined">
                    chat
                </span>
                <h3>Mensajes</h3>
            </a>



            <a class="aside-a" href="admin.php">
                <span class="material-symbols-outlined">
                    shield_person
                </span>
                <h3>Administradores</h3>
            </a>

            <a class="aside-a" href="../../controlador_back/config/logout.php">
                <span class="material-symbols-outlined">
                    logout
                </span>
                <h3>Cerrar Sesión</h3>
            </a>

        </aside>

        <div class="main-section-container">
            <section class="dashboard-main-section">
                <div class="dashboard-main-box">

                    <h2 class="dashboard-main-box-h2">Productos Activos</h2>

                    <div class="dashboard-main-span-container">
                        <span class="dashboard-main-box-span">10</span>
                    </div>
                </div>

                <div class="dashboard-main-box">

                    <h2 class="dashboard-main-box-h2">Ventas totales</h2>

                    <div class="dashboard-main-span-container">
                        <span class="dashboard-main-box-span">5</span>
                    </div>
                </div>

                <div class="dashboard-main-box">

                    <h2 class="dashboard-main-box-h2">Ganancia mensual</h2>

                    <div class="dashboard-main-span-container">
                        <span class="dashboard-main-box-span">$ 150</span>
                    </div>
                </div>
            </section>

            <!-- Charts -->
            <section class="charts-section">

                <div class="charts-box">
                    <h2>Grafica 1</h2>
                </div>

                <div class="charts-box">
                    <h2>Grafica 2</h2>
                </div>
            </section>

            <!-- New Orders -->

            <section class="orders-section">

                <div class="orders-box">
                    <h2>Orders</h2>

                    <div class="orders-box-container">
                        <div class="orders-list">
                            <img src="admin_img/main.jfif" alt="">
                            <h3>Zapato talla grande para hombre</h3>
                            <h3>Diego Garcia</h3>
                            <h3>$ 160.000</h3>
                            <a href=""><button>Ver mas</button></a>
                        </div>

                        <div class="orders-list">
                            <img src="admin_img/main.jfif" alt="">
                            <h3>Nombre del articulo:</h3>
                            <h3>Usuario</h3>
                            <h3>Precio</h3>
                            <a href=""><button>Ver mas</button></a>
                        </div>

                        <div class="orders-list">
                            <img src="admin_img/main.jfif" alt="">
                            <h3>Nombre del articulo</h3>
                            <h3>Usuario</h3>
                            <h3>Precio</h3>
                            <a href=""><button>Ver mas</button></a>
                        </div>

                        <div class="orders-list">
                            <img src="admin_img/main.jfif" alt="">
                            <h3>Nombre del articulo</h3>
                            <h3>Usuario</h3>
                            <h3>Precio</h3>
                            <a href=""><button>Ver mas</button></a>
                        </div>

                    </div>
                </div>

            </section>


        </div>


        <section class="dashboard-reminder">
            <h1>Notas</h1>

            <div class="dashboard-reminder-box reminder-done">
                <h2>Titulo de la nota</h2>
                <p>Contadordecaracteres.com es un contador automático de caracteres y palabras en un texto. Solo
                    colocque el cursor dentro de la caja de textos y comienze a escribir y el contador de caracteres
                    comenzara a contar sus palabras y caracteres a medida de que usted vaya escribiendo. esto es muy
                    genial para </p>
            </div>

            <div id="dashboard-open-reminder-modal" class="dashboard-reminder-box">
                <span class="material-symbols-outlined">
                    add
                </span>
            </div>
        </section>

        <div class="dashboard-reminder-modal" id="ReminderModal">
            <div class="dashboard-reminder-modal-content">
                <span class="dashboard-reminder-modal-close">&times;</span>
                <form action="" class="reminder-modal-form">
                    <h2>Texto de la nota</h2>

                    <label for="text">
                        <textarea class="reminder-form-control" name="text" id="" cols="30" rows="10"></textarea>
                    </label>

                    <div class="dashboard-reminder-modal-submit-container">
                        <input type="submit" value="Agregar Nota" class="dashboard-reminder-submit">
                    </div>


                </form>
            </div>
        </div>



    </div>

    <script src="admin_scripts/admin_js.js"></script>
    <script src="admin_scripts/modal.js"></script>
</body>

</html>