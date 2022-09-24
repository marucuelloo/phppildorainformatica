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
//funcion rand me da un numero aleatorio
    $num=rand();
    echo"el numero es: " . $num . "<br>";

    //tambien podemos ver que la funcion admite 2 argumentos  int rand(int $min, int $max)
    //sirve para acotar entre 2 valores cual es el aleatorio que tiene que generar
    $num2=rand(10,50);
    echo"el numero acotado es " . $num2. "<br>";

    //funcion pow para hallar a potencia de un numero
    //number pow (number $base, number $exp);
    //en esta funcion ambos argumentos son requeridos obligatoriamente
    $num3=pow(5,3);
    echo"el numero acotado es " . $num3. "<br>";

    //hay funciones que no son obligatorios los argumentos
    //funcion round 1 argumento obligatorio y 2 opcionales 
    //round(float $val, int $precision = 0, int $mode = PHP_ROUND_HALF_UP): float
    $num4=5.25;
    echo"el numero redondeado es " . round($num4). "<br>";
    //ojo, redondeaa, no es q saca la parte decimal:
    $num5=5.75;
    echo"el numero redondeado es " . round($num5). "<br>";

    //la parte opcional de esta funcion sirve para cuando tengo numeros decimales muy largos 
    //y no quiero reducir a un entero sino a un decimal con 2 numeros nomas

    $num6=5.2569875652;
    echo"el numero redondeado es " . round($num6,2). "<br>";
    //pongo el numero, la cantidad de decimales


    /////////////////////////////////////////////////////////////////////
    //casting implicito

    $num7="5"; //era de tipo string
    $num7+=2; //al suamarle numero, php asume que $num7 es de tipo entero. Convierte implicitamente un string en int
    $num7+5.25; //asume que desde esta linea $num7 es de tipo float
    echo"el numero es " . $num7. "<br>";

    //casting explicito
    $num8="5";
    //si yo no coloco nada el resultado es tambien de tipo string, si yo quiero que sea int:
    $resultado=(int)$num8;
    echo"el numero convertido de string a int es " . $num8. "<br>";

    ?>
</body>
</html>