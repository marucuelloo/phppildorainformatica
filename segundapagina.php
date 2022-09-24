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
    //no comenzar  con simbolos, si se puede $
    //no comenzar con numeros, si numeros en el medio del nombre pero no empezar 
    //las sentencias siempre terminan en ;
    //variables string van con doble o simple comilla, ya veremos la diferencia


    $nombre="Juan"; 
    $edad=18;
    //se concatena con . y es importante dejar espacios
    print "el nombre del usuario es " . $nombre ;
    //es lo mismo que 
    print "<br/> el nombre del usuario es $nombre";
    //y aca no hace falta concatenar 

    // si coloco comillas simples no reconoce la variable, las simples se usan en comillas anidadas
    print '<br/> el nombre del usuario es $nombre';

    echo "<br/>El nomrbre es " . $nombre . " y tiene " . $edad . " años.";

    echo $nombre, $edad;
    //print $nombre, $edad;

    //diferencia echo admite varias variables a imprimir , print solo toma una variable por vez
    //print  funcion que devuelve el valor 1. Es una funcion y echo una expresion

    ?>
</body>
</html>