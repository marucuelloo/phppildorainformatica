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
//include inserta en nuestro script un código procedente de otro archivo, si no existe dicho archivo o si contiene algún tipo de error nos mostrará un ‘warning‘ por pantalla y el script seguirá ejecutándose.
//require hace la misma operación que include, pero en caso de no existir el archivo o error en el mismo mostrará un ‘fatal error‘ y el script no se sigue ejecutando.
require ("v38datosconexion.php");

//abrimos la conexion:
$conexion=new mysqli($local_bd, $usuario, $contra);
//podemos presindir del nombre de la base de datos

//no logramos conexion
  if(mysqli_connect_errno()){
       echo "Fallo al conectar con bbdd";
    exit();
  }

//indicamos la bd con la que queremos conetar: y 
 //en el caso que pongamos mal el nombre de la bd 
mysqli_select_db($conexion, $bd) or die("No se encuentra la base de datos");

//consulta
$query="SELECT * FROM DATOSPERSONALES";
//para ejecutar la consulra mysqli_query(conexion, sql); pasa 2 argumentos: $conexion y donde tenemos almacenado la insntruccion sql
$resultados=mysqli_query($conexion, $query);


// //mysqli_fetch_row( ejecuta una linea del resultado). si la llamas una 2da vez ejcuta la 2linea. y asi sucesivamente
// //si yo la introduzco en un bucle, logro listar todo el resultado
// $fila=mysqli_fetch_row($resultados);
// //$fila es un array que almacena todos los datos
// echo $fila[0] . " ";
// echo $fila[1]. " ";
// echo $fila[2]. " ";
// echo $fila[3]. "";
// echo "<br>";

// $fila=mysqli_fetch_row($resultados);
// //$fila es un array que almacena todos los datos
// echo $fila[0] . " ";
// echo $fila[1]. " ";
// echo $fila[2]. " ";
// echo $fila[3]. " ";
// echo "<br>";

// $fila=mysqli_fetch_row($resultados);
// //$fila es un array que almacena todos los datos
// echo $fila[0] . " ";
// echo $fila[1]. " ";
// echo $fila[2]. " ";
// echo $fila[3]. " ";
// echo "<br>";

//lo que se hace es meter la instruccion en un bucle
//en este caso se que son 3 registros:
// $registros=1;
// while($registros<=3){
//     $fila=mysqli_fetch_row($resultados);

// echo $fila[0] . " ";
// echo $fila[1]. " ";
// echo $fila[2]. " ";
// echo $fila[3]. " ";
// echo "<br>";
// $registros++;

// }

//cuando no se el nro de registros 

 while($fila=mysqli_fetch_row($resultados)){

 echo $fila[0] . " ";
 echo $fila[1]. " ";
 echo $fila[2]. " ";
echo $fila[3]. " ";
echo "<br>";

}

//cerrar la conexion

mysqli_close($conexion);
//podes tener una web con conexion a mas de una bd



?>
</body>
</html>