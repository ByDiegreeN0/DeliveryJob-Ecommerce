<?php 

require("../config/conexion.php");


$MensajeID = $_GET['id'];


$sql = "DELETE FROM tbl_message where message_id = '$MensajeID'";
$result = mysqli_query($conexion, $sql);

if($result) {
    echo  "<script>
    alert('Se ha eliminado el mensaje con exito');
    window.location.href = '../../vista_front/admin/message.php';
</script>";
} else {
    echo  "<script>
    alert('No se ha podido eliminar el mensaje, intentalo otra vez');
    window.location.href = '../../vista_front/admin/message.php';
    </script>";
};


?>