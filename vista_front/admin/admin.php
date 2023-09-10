<?php

require_once("../../modelo_db/Models/autoload.php");


$ConnectionDB = new DatabaseConnection();
$Connect = $ConnectionDB->connectDB();

session_start();

$current_session = $_SESSION['administrador'];


if ($current_session == null || $current_session == "") {
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

    <title>Dashboard | Admin</title>
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

            <a class="aside-a" href="message.php">
                <span class="material-symbols-outlined">
                    chat
                </span>
                <h3>Mensajes</h3>
            </a>



            <a class="aside-a aside-active" href="admin.php">
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

        <!-- Products -->

        <div class="admin-list-container">

            <?php foreach ($Connect->query("SELECT * FROM tbl_admin") as $row) { ?>
                <?php if ($row) { ?>
                    <div class="admin-list-box">

                        <div class="admin-list-box-img">
                            <img src="admin_img/admin.png" alt="">
                        </div>

                        <div class="admin-list-box-content">
                            <h3><b>Username del Administrador:</b></h3>
                            <p><?php echo $row['admin_username'] ?></p>
                            <h3><b>Correo del Administrador:</b></h3>
                            <p><?php echo $row['admin_email'] ?></p>
                        </div>
                    </div>
                <?php  }else {
                    echo "<h3>No hay mensajes nuevos</h3>";
                } ?>

            <?php } ?>

        </div>




        <div id="dashboard-open-reminder-modal" class="dashboard-reminder-box">
            <span class="material-symbols-outlined">
                add
            </span>
        </div>

    </div>


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
</body>

</html>