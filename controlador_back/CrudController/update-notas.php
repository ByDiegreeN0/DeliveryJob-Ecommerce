<?php 

require_once("../../modelo_db/Models/autoload.php");

$Notes = new NotesClass;

// Variables

$id = $_POST['id'];
$tittle = $_POST['tittle'];
$text = $_POST['text'];

if($Notes->UpdateNote($tittle, $text, $id)){
    echo "<script>
    alert('Se actualizaron los articulos correctamente');
    window.location.href = '../../vista_front/admin/admin.php';
    </script>";
}else {
    echo "<script>
    alert('Se actualizaron los articulos correctamente');
    window.location.href = '../../vista_front/admin/admin.php';
    </script>";
}




?>