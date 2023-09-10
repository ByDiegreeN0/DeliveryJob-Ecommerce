<?php 

function autoload($className){
    require_once($className.".php");
}

spl_autoload_register("autoload");


?>