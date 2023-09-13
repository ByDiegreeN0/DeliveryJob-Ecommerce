<?php 

require_once("../../modelo_db/Models/autoload.php");


$TituloNota = $_POST['tittle'];
$TextNota = $_POST['text'];

$sql = "INSERT INTO notes (nota_tittle, nota_mensaje) VALUES ('$TituloNota','$TextNota')";
$result = mysqli_query($conexion, $sql);

if($result) {
    echo  "<script>
    alert('Se ha insertado una nota con exito');
    window.location.href = '../admin/notes.php';
</script>";
} else {
    echo  "<script>
    alert('Ha ocurrido un error al insertar la nota, intentalo otra vez');
    
</script>";

echo mysqli_error($conexion);
};


?>