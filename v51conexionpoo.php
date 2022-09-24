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
    //argumentos: nuestro host, usuario, contra en blanco y nombre de bd
    
$conexion=new mysqli("localhost", "root","", "pruebas");

//cuando no hay conexion
if(mysqli_connect_errno()){
    echo "Fallo al conectar con bbdd";
 exit();
}
 //esto era en procedimental...  usar los caracteres latinos: mysqli_set_charset($conexion, "utf8");
 //ahora en poo es:
$conexion->set_charset("utf8");


//consulta:
$sql="SELECT * FROM PRODUCTOS";
//poo ahora:
$resultado=$conexion->query($sql);
if($conexion->errno){
    die($conexion->error);

}

//fetch_assoc() se usa para array asociativo
while ($fila=$resultado->fetch_assoc()){
    echo "<table><tr><td>";
    echo $fila['CÓDIGOARTÍCULO'] . "</td><td>";
    echo $fila['NOMBREARTÍCULO']. "</td><td>";
    echo $fila['SECCIÓN']. "</td><td>";
    echo $fila['IMPORTADO']. "</td><td>";
    echo $fila['PRECIO']. "</td><td>";
    echo $fila['PAÍSDEORIGEN']. "</td><td></tr></table>";
   echo "<br>";
   echo "<br>";
    }


//     //fetch_array indices
// while ($fila=$resultado->fetch_array()){
//     echo "<table><tr><td>";
//     echo $fila[0] . "</td><td>";
//     echo $fila[1]. "</td><td>";
//     echo $fila[2]. "</td><td>";
//     echo $fila[3]. "</td><td>";
//     echo $fila[4]. "</td><td>";
//     echo $fila[5]. "</td><td></tr></table>";
//    echo "<br>";
//    echo "<br>";
 //   }


    //cerrar la conexion con poo
    $conexion->close();




?>
</body>
</html>