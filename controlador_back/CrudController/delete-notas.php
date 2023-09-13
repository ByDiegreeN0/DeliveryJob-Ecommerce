<?php 

require("../../modelo_db/Models/autoload.php");

$NotesClass = new NotesClass;

$id = $_GET['id'];

if($NotesClass->DeleteNote($id)){
    echo "<script>
    alert('Se ha eliminado esta nota con éxito.')
    window.location.href = '../../vista_front/admin/products.php';
    </script>";
}else {
    echo "<script>
    alert('La operación no se pudo complear, intentalo mas tarde.')
    window.location.href = '../../vista_front/admin/products.php';
    </script>";
}






?>