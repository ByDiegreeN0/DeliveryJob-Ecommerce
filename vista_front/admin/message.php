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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="admin_styles/admin_dashboard_styles.css">

    <link rel="icon" href="../../vista_front/img/body/DeliveryJobMain.png">

    <title>Dashboard | Mensajes</title>
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

                    <a href="message.php">
                        <span class="material-symbols-outlined">
                            chat
                        </span>
                        <h3>Mensajes</h3>
                    </a>
                </li>

              

                <li>
                    <a href="admin.php">
                        <span class="material-symbols-outlined">
                            shield_person
                        </span>
                        <h3>Administradores</h3>
                    </a>
                </li>

                <li>
                    <a href="../../controlador_back/config/logout.php">
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
            <a class="aside-a" href="dashboard.php">
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

            <a class="aside-a aside-active" href="message.php">
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

        <section class="message-container">

            <?php foreach ($Connect->query("SELECT * FROM tbl_message") as $row) { ?>
                <div class="message-box">
                    <a href="../../controlador_back/CRUD/delete-mensajes.php?id=<?php echo $row['message_id']; ?>"><button class="message-box-delete">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </button></a>
                    <h3><b>Fecha:</b> Hoy</h3>
                    <h3><b>Nombre:</b><?php echo $row['message_name']; ?></h3>
                    <h3><b>Asunto:</b><?php echo $row['message_asunto']; ?></h3>
                    <h3><b>Correo:</b><?php echo $row['message_email']; ?></h3>
                    <h2>Mensaje</h3>
                        <p><?php echo $row['message_m']; ?>
                            <!-- 450 caracteres MAX -->
                </div>

            <?php } ?>
        </section>



    </div>


    <script src="admin_scripts/admin_js.js"></script>
</body>

</html>