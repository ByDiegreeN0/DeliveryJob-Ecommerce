<?php 

require_once("../../modelo_db/Models/autoload.php");


$NameMensaje = $_POST['name'];
$AsuntoMensaje = $_POST['asunto'];
$CorreoMensaje = $_POST['correo'];
$Mensaje = $_POST['mensaje'];

$sql = "INSERT INTO tbl_message (message_name, message_asunto, message_email, message_m) VALUES ('$NameMensaje','$AsuntoMensaje', '$CorreoMensaje', '$Mensaje')";
$result = mysqli_query($conexion, $sql);

if($result) {
    echo  "<script>
    alert('Se ha enviado tu mensaje con exito');
    window.location.href = '../../vista_front/index.html';
</script>";
} else {
    echo  "<script>
    alert('Algo ha ocurrido, no se pudo enviar tu mensaje');
    window.location.href = '../../vista_front/index.html';
    </script>";
};


?>