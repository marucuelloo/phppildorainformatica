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
    echo"Este es el primer mensaje <br/>";
    //puedes llamar la funcion antes o despues de haberla creado

    //  function dameDatos(){
    //    echo "este es el mensaje del interior de la funcion<br/>";
    //   }
    //  dameDatos();


    //llamamos al archivo externo
    include ("proporcionaDatos.php");
    //llamamos la funcion
    dameDatos();
     echo"Este es el segundo mensaje <br/>";
    //  dameDatos();
    //  dameDatos();


    ?>
</body>
</html>