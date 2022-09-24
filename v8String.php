<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .resaltar{
            color:#F00;
            font-weight:bold;

        }
    </style>

</head>
<body>
    <?php

    /*resaltar va con comillas simples, ya que esta dentro de unas comillas dobles
    sino me da error
    tambien se puede hacer al revez, comilla padre simple y comilla hija doble */

          echo"<p class='resaltar'>esto es un ejemplo de frase</p>";
//si uso ambas comillas dobles o ambas comillas simples ambas veces uso barra invertida para que no me de error
  // entiende que lo que esta entre \ no forma parte del strin
  // \ se hace con alt92       
echo"<p class=\"resaltar\">esto es un ejemplo de frase</p>";

////////////////////////////////////////////////////////////////////////////////////////////////////

$nombre="Maru";

//algo a tener en cuenta es que cuando usamos entre comillas el llamado de una variable, debe ser con comillas dobles
//las comillas simples toman literal lo que estas escribienod

echo "hola $nombre <br/>";

echo 'hola $nombre <br/>';
////////////////////////////////////////////////////////////////////////////////////////////////

/*Comparar cadenas de caracteres para ver si son iguales o para ver si no lo son

strcmp
comparar valores de tipo string teniendo en cuenta mayusculas y minusculas

strcasecmp
comparar valores de tipo string sin distinguir mayusculas y minusculas

ambas funciones devuelven un 0 si coincide
y un 1 cuando no coinciden

1true 0 false */ 

$variable1="casa";
$variable2="CASA";
$resultado=strcmp($variable1, $variable2); //devuelve 1 si no son iguales // 0 si son iguales
//devolvera un 1, no son iguales xq tiene en cuenta mayusculas y minusculas 
echo "el resultado cuando si distingue may y min es $resultado, es decir no son iguales xq uno esta en mayuscula y otro en minuscula <br/>";
$resultado2=strcasecmp($variable1, $variable2);
echo "el resultado cuando no distingue mayusculas y minuscula es $resultado2, es decir son iguales xq no importa como esten escritos <br/>";


//si resultado es verdadero, es decir es 1 no coinciden
  if($resultado) {
    echo "No coinciden <br/>";
  }else{
    echo "coincicen <br/>";
  }

//si resultado es falso, es decir es 0 coinciden y se usa negacion !
//cualquiera de las formas es valida y dicen lo mismo
  if(!$resultado) {
    echo "coinciden <br/>";
  }else{
    echo "No coincicen <br/>";
  }
   
   
   ?> 
</body>
</html>