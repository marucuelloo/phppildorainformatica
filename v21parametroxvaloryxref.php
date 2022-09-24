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
    //parametro por valor 
    function incrementa ($valor1){
        $valor1++;
        return $valor1;
    }
    $numero=5;
    echo incrementa($numero) . "<br>";
    echo $numero;
    //en este caso me imprime 6 y 5
    //cuando paso parametro por referencia me devuelve 6 y 6. me tranforma el valor de la variable. en teoria jaja a mi me da 6 y 5 
echo("____________________________________________________________________________________________________<br>");
//parametro por referencia 
    function incrementa2 (&$valor2){
        $valor2++;
        return $valor2;
    }
    $numero2=5;
    echo incrementa($numero2) . "<br>";
    echo $numero2;

    ////////////////////paso de parametro x valor otro ej
    echo("____________________________________________________________________________________________________<br>");

    function camba_mayus($param){
        //pasar a minusculas 
        $param=strtolower($param);
        //primera letra de cada palabra en
        $param=ucwords($param);
        return $param;

    }
    $cadena="HoLa MuNdo";

    echo camba_mayus($cadena). "<br>";

    echo $cadena;


    ////////////////////paso de parametro referencia 
    //hay unvinculo entro el parametro y el argumento o variable que le estamos pasando: $param y $cadena 
    //se combinan por eso me devuelve Hola Mundo 2 veces... combino todo minuscula con primera letra mayuscula de cada palabra 
    echo("____________________________________________________________________________________________________<br>");

    function camba_mayus2(&$param){
        //pasar a minusculas 
        $param=strtolower($param);
        $param=ucwords($param);
        return $param;

    }
    $cadena="HoLa MuNdo";

    echo camba_mayus2($cadena). "<br>";

    echo $cadena;



    ?>
</body>
</html>