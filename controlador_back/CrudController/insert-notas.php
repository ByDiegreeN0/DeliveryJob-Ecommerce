<?php 

require_once("../../modelo_db/Models/autoload.php");

$Notes = new NotesClass;

$TituloNota = $_POST['tittle'];
$TextNota = $_POST['text'];


if($Notes->CreateNote($TituloNota, $TextNota)) {
    echo  "<script>
    alert('Se ha insertado una nota con exito');
    window.location.href = '../../vista_front/admin/dashboard.php';
</script>";
} else {
    echo  "<script>
    alert('Ha ocurrido un error al insertar la nota, intentalo otra vez');
    window.location.href = '../../vista_front/admin/dashboard.php';
</script>";

echo mysqli_error($conexion);
};


?>