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
                      //nombre aspciativo   //elemento
$alimentos=array("fruta"=>array("tropical"=>"kiwi",
                                  "citrico"=>"mandarina",
                                  "tipomanzana"=>"roja"), 
                                 
                  "leche"=>array("origen animal"=>"vaca",
                                  "origen vegetal"=>"coco"), 

                 "carne"=>array("vaca"=>"lomo",
                                 "pollo"=>"pata", 
                                 "cerdo"=>"chorizo"));

//como acceder a un elemento del array de 2 dimensiones
//quiero acceder a lomo
//primero el nombre del array principal: alimentos, luego el nombre de la primera dimensiones: carne y  el nombre asociativo del elemento:vaca

echo $alimentos["carne"]["vaca"] . "<br>";


//como recorrer un array de dos dimensiones
//funcion list. crear un listado
//crear 2 elementos que identifique: por un lado primera dimension(fruta, carne y leche)
//por el otro, la 2da dimension, que es cada uno de sus respectivos array 
//foreache(nombredel array as tipodealimento=>alimento)
//$clave_alim representa la primera dimension: fruta lche y carne
//$alim representa la 2da dimension: cada uno de los array
foreach($alimentos as $clave_alim=>$alim){
    echo"$clave_alim:  <br>";
    //$alim representa a todo el array. debo desdoblarlo
    //creo un nombre representativo para el nombre asociativo y otro nombre representativo para el elemento en si: clave, valor
    //por cada $alim desdoble en su clave y su valor, que lo haga mientras haya elementos en la lista
    foreach ($alim as $clave => $valor) {
        echo "$clave=$valor <br>";
    }
        echo "<br>";
 }

 //todo eso se puede simplicar con funcion predefinida var_dump
 echo var_dump($alimentos);




?>
</body>
</html>