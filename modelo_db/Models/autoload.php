<?php

function autoload($ClassName)
{
    require_once($ClassName . ".php");
}
spl_autoload_register('autoload');


?>