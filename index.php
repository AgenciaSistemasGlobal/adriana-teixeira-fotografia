<?php
    require "server/Url.class.php";

    $modulo = Url::getURL(0);
    $modulo2 = Url::getURL(1);

    if($modulo=="adm") {

        if($modulo2 == null)
            $modulo2 = "home";
        
        require "paginas/adm/index.php";
    } else {
        
        if($modulo == null)
            $modulo = "home";
        
        require "paginas/index.php";
    }
?>