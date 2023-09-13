<?php 

require("../../modelo_db/Models/autoload.php");

$Messages = new MessagesClass;

$id = $_GET['id'];

if($Messages->DeleteMessage($id)) {
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