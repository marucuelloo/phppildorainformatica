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
    require("datosconexion.php");
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
mysqli_set_charset($conexion, "utf8");
$consulta="SELECT FOTO FROM PRODUCTOS WHERE CÓDIGOARTÍCULO= 'AR01'";
$resultado=mysqli_query($conexion, $consulta);
while($fila=mysqli_fetch_array($resultado)){
    $rutaimg=$fila["FOTO"]; 
}

?>

<div>
    <img src="/img/<?php echo $rutaimg; ?>" alt="imagen del primer articulo" widt="50%"/>


</div>
</body>
</html>