<?php 

require_once("../../modelo_db/Models/autoload.php");

$Message = new MessageClass;


$Name = $_POST['name'];
$Email = $_POST['asunto'];
$Asunto = $_POST['email'];
$Texto = $_POST['mensaje'];

if($Message->CreateMessage($Name, $Email, $Asunto, $Texto)) {
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