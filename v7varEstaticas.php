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

    //static
//objetivo: incrementar una variable. Iniciamos y la incrementamos en 1 
    function incrementaVariable(){
        static $contador=0;
        $contador++;
        //imprimimos el valor de la variable 
        echo $contador . "<br>";
    }
    //cuando la funcion termina el valor de las variables locales de la funcion se destruye 
    //si queremos que la variable no se destruya y se conserve(el contador):
    //creamos una variable estatica: static antes de la declaracion de la variable 


    //llamamos la variable
    incrementaVariable();
    incrementaVariable();
    incrementaVariable();
    incrementaVariable();
    ?>
</body>
</html>