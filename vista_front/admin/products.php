<?php

require_once("../../modelo_db/connect/connection.php");

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

    <link rel="stylesheet" href="../styles/styles.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="admin_styles/admin_dashboard_styles.css">

    <link rel="icon" href="../../vista_front/img/body/DeliveryJobMain.png">

    <title>Dashboard | Productos</title>
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

            <a class="aside-a aside-active" href="products.php">
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

        <!-- Products -->

        <div class="products-list-container">

            <div id="dashboard-open-reminder-modal" class="dashboard-reminder-box">
                <span class="material-symbols-outlined">
                    add
                </span>
            </div>
            <?php foreach($Connect->query("SELECT * FROM tbl_products")as $row){ ?>
            <div class="products-list-box-container">

                <div class="products-list-box">
                    <img src="../img/body/tenis.jpeg" alt="" class="products-list-img">
                </div>

                <div class="products-list-content">
                    <h2><?php echo $row['prod_name']; ?></h2>
                    <h3><b>Descripción:</b><?php echo $row['prod_desc']; ?></h3>
                    <h3><b>Stock:</b><?php echo $row['prod_stock']; ?></h3>
                    <h3><b>Precio:</b> $ <?php echo $row['prod_price']; ?></h3>

                    <div class="products-list-button-container">
                        <a href="edit.php?id=<?php echo $row['prod_id'] ?>"><button class="products-list-button">Modificar</button></a>


                        <a href="../../controlador_back/CRUD/delete-articulos.php?id=<?php echo $row['prod_id'] ?>"><button class="products-list-button products-delete">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                            </button></a>


                    </div>
                </div>

            </div>
            <?php } ?>


        </div>

    </div>


    <div class="dashboard-reminder-modal" id="ReminderModal">
        <div class="dashboard-reminder-modal-content">
            <span class="dashboard-reminder-modal-close">&times;</span>
            <form action="" class="reminder-modal-form">
                <h2>Ingresar Nuevo producto</h2>

                <form action="../../controlador_back/CRUD/insert-articulos.php" method="post" enctype="multipart/form-data">

                    <input class="form-control" type="file" name="img" id="">

                    <label for="name">Nombre
                        <input class="form-control" type="text" name="name" id="" placeholder="Nombre del producto">
                    </label>

                    <label for="desc">Descripcion
                        <textarea class="form-textarea" name="desc" id="" cols="30" rows="10"></textarea>
                    </label>

                    <label for="precio">Precio
                        <input class="form-control" type="number" name="precio" id="" placeholder="Precio del producto">
                    </label>

                    <label for="stock">Stock
                        <input class="form-control" type="number" name="stock" id="" placeholder="Stock del producto">
                    </label>


                    <div class="dashboard-reminder-modal-submit-container">
                        <input type="submit" value="Agregar Producto" class="dashboard-reminder-submit">
                    </div>
                </form>


            </form>
        </div>
    </div>



    </div>

    <script src="admin_scripts/admin_js.js"></script>
    <script src="admin_scripts/modal.js"></script>
</body>

</html>