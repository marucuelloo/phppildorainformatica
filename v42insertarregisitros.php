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
//incluir los datos de conexion
require ("v38datosconexion.php");

//abrimos la conexion. conectar con la bd:
$conexion=new mysqli($local_bd, $usuario, $contra);

//error de conexion
if(mysqli_connect_errno()){
    echo "Fallo al conectar con bbdd";
 exit();
}
//si no encuentra la bd:
mysqli_select_db($conexion, $bd) or die("No se encuentra la base de datos");

//codificacion de caracteres
mysqli_set_charset($conexion, "utf8");

//CONSULTA: nueva consulta insert into 
$query="INSERT INTO PRODUCTOS (CÓDIGOARTÍCULO,  SECCIÓN, NOMBREARTÍCULO) VALUES ('AR44', 'DEPORTES', 'RAQUETA TENIS')" ;
//para ejecutar la consulra mysqli_query(conexion, sql); pasa 2 argumentos: $conexion y donde tenemos almacenado la insntruccion sql
$resultados=mysqli_query($conexion, $query);


//cerrar la conexion
mysqli_close($conexion);

 

?>
    
</body>
</html>