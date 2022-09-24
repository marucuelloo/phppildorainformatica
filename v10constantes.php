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
    define("AUTOR", "Maru");
    //para el caso de las constantes no puedo meter a la cosntante dentro de "" xq solo va leer la constante
    //debemos concatenar con el .
    //no olvidar que la constante va en mayuscula
    //el true es en teoria x si alguien lo ingresa en minuscula, pero a mi em da error igual
    echo "el autor es: " . AUTOR . "<br>";

    echo "la linea de esta instruccion es " .  __LINE__ . "<br>";
    echo "estamos trabajando con este fichero " . __FILE__ . "<br>"
 
    ?>
    
    
</body>
</html>