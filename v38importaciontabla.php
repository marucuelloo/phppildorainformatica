<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width:50%;
            border: 1px dotted #FF0000;
            margin:auto;
       }



    </style>
</head>
<body>
    <?php

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

//consulta llama a la nueva tabla productos. ya importada en el admin
//no importa si mayusucula o minuscula pero igual escrito, ojo con las tildes 
$query="SELECT * FROM PRODUCTOS WHERE  paísdeorigen='españa'" ;
//para ejecutar la consulra mysqli_query(conexion, sql); pasa 2 argumentos: $conexion y donde tenemos almacenado la insntruccion sql
$resultados=mysqli_query($conexion, $query);



//para mostrar los datos, creaba un array ($filas) y la funcion mysqli_fetch_row permitia guardar el array en la variable fila 
//y para accder al array debia usar los indices
 while($fila=mysqli_fetch_row($resultados)){
echo "<table><tr><td>";
 echo $fila[0] . "</td><td>";
 echo $fila[1]. "</td><td>";
 echo $fila[2]. "</td><td>";
echo $fila[3]. "</td><td>";
echo $fila[4]. "</td><td>";
echo $fila[5]. "</td><td>";
echo $fila[6]. "</td><td></tr></table>";
echo "<br>";
echo "<br>";

}
//me muestra los primeros 4 campos

//cerrar la conexion

mysqli_close($conexion);
//podes tener una web con conexion a mas de una bd



?>
</body>
</html>