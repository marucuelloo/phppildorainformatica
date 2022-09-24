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

try{
    $base=new PDO('mysql:host=localhost; dbname=pruebas', 'root', "");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");
    //voy a crear una var para decir cuantos registros quiero ver por pag, para usar en el limit 
    $datosxpag=3;
    //creo otra var que pretende mostrar la pag en la q estamos al cargar por primera vez nuestra pag web 
    $pagina=1;
    //voy a crear otra variable me va almacenar el registro desde el cual quiero empezar a mostrar los resultados 
    //ej pag 1..el indice me da 0, si es pag 3 (3-1)*3=6, a partir del registro 6 7 8 se mostrara en la pag
    $empezardesde=($pagina-1)*$datosxpag;

//esta primera instruccion es para saber cuantos registros va devolver la consulta y hacer los calculos necesarios
    $sql="SELECT NOMBREARTÍCULO, SECCIÓN, PRECIO, PAÍSDEORIGEN FROM PRODUCTOS WHERE SECCIÓN='DEPORTES'";
$resultado=$base->prepare($sql);
$resultado->execute(array());
//indica el numero de filas: la funcion rowcount. sabemos el numero de registros 
$numerodefilas=$resultado->rowCount();
//creo una var y divido el numero de regitros por la cant de datos por pag 
//en este caso 12/3=4
//la funcion ceil lo q hace es redondear el resultado . si me diera 3.7 redondea a 4 paginas 
$totalpaginas=ceil($numerodefilas/$datosxpag);
echo "Número de registros de la consulta: " . $numerodefilas . "<br>";
echo "Mostramos " . $datosxpag . "registros por página". "<br>";
echo "Mostrando la pagina " . $pagina . "de ". $totalpaginas. "<br><br>";
 
$resultado->closeCursor();

//luego hacemos la consulta para q me muestre de 3 en 3
    //las intrucciones admiten un parametro que se llama limit(a)cual es el primer registro que quieres ver , b) cuants registros a partir del que pusiste en el parametro anterior quieres ver  )admite 2 datos
//luego en lugar de valores fijos en limit vamos a introducir variables 
$sqllimit="SELECT NOMBREARTÍCULO, SECCIÓN, PRECIO, PAÍSDEORIGEN FROM PRODUCTOS WHERE SECCIÓN='DEPORTES' LIMIT  $empezardesde,$datosxpag";
$resultado=$base->prepare($sqllimit);
$resultado->execute(array());
while ($registro=$resultado->fetch(PDO:: FETCH_ASSOC)){
    echo "Nombre Articulo: " . $registro["NOMBREARTÍCULO"] . "Seccion: " . $registro["SECCIÓN"] . "Precio: " . $registro["PRECIO"] . "Pais:" . $registro["PAÍSDEORIGEN"] . "<BR>";
}

}catch(exception $e){ //si no lo consigues,mate el proceso y msj de error:
    die ('error: ' . $e->GetMessage());
    echo "Linea del error: " . $e->getLine();
     }


?>
</body>
</html>