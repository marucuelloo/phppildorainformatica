<?php

try{
    $base=new PDO('mysql:host=localhost; dbname=pruebas', 'root', "");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");
}catch(exception $e){ //si no lo consigues,mate el proceso y msj de error:
    die ('error: ' . $e->GetMessage());
    echo "Linea del error: " . $e->getLine();
     }


?>