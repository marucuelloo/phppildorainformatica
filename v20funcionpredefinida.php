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
     $palabra="Maru";

    //strtolower convierte cadena de texto a minuscula
    //sintaxis: strtolower(string $string): string
   //en este caso hay una funcion predefinidia dentro de otra funcion predefinida
    echo(strtolower($palabra) . "<br>");

    $palabra2="Maru";
    echo(strtoupper($palabra2). "<br>");

    ////////////////////////////funcion propia y argumentos

    function suma($num1, $num2){
        $resultado=$num1+$num2;
        return $resultado;
    }
    //a las funciones siempre hay q llamarlas 
    //y en este caso hay q pasar 2 argumentos
    //y hay q decirle que lo muestre en pantalla
    echo(suma(5,7)). "<br>";

    /////////////parametros por defecto
    //vamos hacer una funcion que permita pasar de mayusculas a minusculas y que sea capaz de convertir la primera letra
    //de todas las palabras en mayuscula

    //funcion propia que recibe 2 argumentos y a uno por defecto le dice que es true
    function frase_mayuscula($frase, $conversion=true){
        //pase a minuscula el parametro frase
        $frase=strtolower($frase);
        if($conversion==true){
            //si es verdadero que ponga solo la primera letra de la frase en mayuscula
            $resultado=ucwords($frase);
        }else{
            //sino, si es falsa, que ponga la frase eb mayuscula
            $resultado=strtoupper($frase);
        }
        return $resultado;
    }
        //en este caso no le pasamos el estado de conversion, entonces por defecto lo toma verdadero
    echo(frase_mayuscula("esto es una prueba <br>"));
    //si le ponemos false, ya no toma por defecto y pasa lo del else
    
    echo(frase_mayuscula("esto es una prueba", false));



    
    ?>
</body>
</html>