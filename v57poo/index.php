<?php
require "devuelveprod.php";

//necesito crear una instancia. para que? para que se ejecute el constructor de la clase devuelveprod.php
//que es el que llama al constructor que llama a la conexion 
$productoss= new Devuelveproducto();
$arrayprod=$productoss->get_productos();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    foreach($arrayprod as $elemento){
        echo "<table><tr><td>";
 echo $elemento['CÓDIGOARTÍCULO'] . "</td><td>";
 echo $elemento['NOMBREARTÍCULO']. "</td><td>";
 echo $elemento['SECCIÓN']. "</td><td>";
 echo $elemento['IMPORTADO']. "</td><td>";
 echo $elemento['PRECIO']. "</td><td>";
 echo $elemento['PAÍSDEORIGEN']. "</td><td></tr></table>";
echo "<br>";
echo "<br>";
    }


?>



    
</body>
</html>