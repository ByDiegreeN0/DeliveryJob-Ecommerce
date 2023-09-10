<?php

require_once("../../modelo_db/connect/connection.php");

$ConnectionDB = new DatabaseConnection();
$Connect = $ConnectionDB->connectDB();

session_start();

$current_session = $_SESSION['administrador'];


if ($current_session == null || $current_session == ""){
    header("LOCATION: 403.html");
}

$id = $_GET['id'];

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

        <section class="edit-products-container">

            <?php foreach($Connect->query("SELECT * FROM tbl_products WHERE prod_id = '$id'")as $row){ ?>
            <div class="edit-products-box">

                <div class="edit-products-img">
                    <img src="admin_img/main.jfif" alt="">
                </div>

                <div class="edit-products-content">
                    <form class="edit-products-form" action="" method="POST">

                        <label for="name">
                            <h2>Nombre del articulo</h2>
                            <input class="form-control" type="text" name="name" id="" placeholder="Nombre del articulo" required value="<?php echo $row['prod_name']; ?>">
                        </label>

                        <label for="desc">
                            <h2>Descripción del producto</h2>
                            <textarea class="form-textarea" name="desc" id="" cols="30" rows="10" required><?php echo $row['prod_desc']; ?></textarea>
                        </label>

                        <div class="edit-products-form-divider">

                            <div class="edit-products-form-divider-box">
                                <label for="price">
                                    <h2>Precio</h2>
                                    <input class="form-control" type="number" name="price" id="" placeholder="Precio del producto" required value="<?php echo $row['prod_price']; ?>">
                                </label>
                            </div>



                            <div class="edit-products-form-divider-box">
                                <label for="stock">
                                    <h2>Stock</h2>
                                    <input class="form-control" type="number" name="stock" id="" placeholder="Cantidad disponible" required value="<?php echo $row['prod_stock']; ?>">
                                </label>
                            </div>


                        </div>

                        <label for="estado"><h2>Estado del producto</h2>
                            <select class="form-control form-select" name="estado" id="">
                                <option selected value="<?php echo $row['prod_estado']; ?>"><?php echo $row['prod_estado']; ?> (Actual)</option>
                                <option value="">Seleccione uno</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo" >Inactivo</option>
                            </select>
                        </label>

                        <div class="edit-products-button-container">
                            <input class="products-list-button edit-products-button" type="submit" value="Guardar Cambios">
                        </div>
                    </form>
                </div>

            </div>
            <?php } ?>

        </section>




    </div>


    <div class="dashboard-reminder-modal" id="ReminderModal">
        <div class="dashboard-reminder-modal-content">
            <span class="dashboard-reminder-modal-close">&times;</span>
            <form action="" class="reminder-modal-form">
                <h2>Ingresar Nuevo producto</h2>

                <form action="../../controlador_back/CRUD/insert-articulos.php" method="post" enctype="multipart/form-data">
                    <label for="name">Nombre
                        <input class="form-control" type="text" name="name" id="" placeholder="Nombre del producto">
                    </label>

                    <label for="desc">Descripcion
                        <textarea name="desc" id="" cols="30" rows="10"></textarea>
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