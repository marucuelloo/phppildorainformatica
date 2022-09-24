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

    //creo una variable. direccion de nuestro servidor de bbdd mysq;
    $local_bd="localhost";
    //nombre bbdd
    $bd="pruebas";
    //usuario
    $usuario="root";
    //contraseña
    $contra="";

//nos pide una serie de parametros: direccion, usuario, contra, 
//linea que conecta con la bbdd
$conexion=new mysqli($local_bd, $usuario, $contra, $bd);

//mysqli_errno se ejecuta siempre y cuando no logremos exito en la conexion con la base
  if(mysqli_connect_errno()){
       echo "Fallo al conectar con bbdd";
    exit();// xq sino siguen intenando conectar a bbdd 
  }

  //cuando no respeta los caracteres latinos. ej no toma la tildes
  //utf8 inlcuye caracteres latinos 
mysqli_set_charset($conexion, "utf8");

//consulta
$query="SELECT * FROM DATOSPERSONALES";
//para ejecutar la consulra mysqli_query(conexion, sql); pasa 2 argumentos: $conexion y donde tenemos almacenado la insntruccion sql 
$resultados=mysqli_query($conexion, $query);
//tabla virtual,en memoria donde acabamos de cargar toda la informacion que nos devulve la sentencia sql
//4 campos y los registros de ellos y la hemos almacenado en $resultados
//tenemos cargado en memoria: una conexion abierta con la bbdd y un resulted o record que es una tabla virtual donde se almacena la isntruccion sql 

//prox paso ver que informacion tiene la tabla virtual 
//otra funcion mysqli_fetch_ro . array con indice 
//ir viendo linea a linea la informacion que hay dentro de esa tabla virtual($resultado)
//permite guardar el array en la variable $fila 
$fila=mysqli_fetch_row($resultados);
//$fila es un array que almacena todos los datos
echo $fila[0] . "<br>";
echo $fila[1]. "<br>";
echo $fila[2]. "<br>";
echo $fila[3]. "<br>";



?>
</body>
</html>