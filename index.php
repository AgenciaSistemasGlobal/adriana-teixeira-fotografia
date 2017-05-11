<?php
    require "server/Url.class.php";
    require "server/Conexao.class.php";

    $modulo = Url::getURL(0);
    $modulo2 = Url::getURL(1);
    $modulo3 = Url::getURL(2);
    $modulo4 = Url::getURL(3);
    $modulo5 = Url::getURL(4);

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