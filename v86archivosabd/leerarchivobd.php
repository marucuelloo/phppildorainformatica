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
    //creamos 3 variables para que cuando me traiga el archivo, tambien me muestre el id, el tipo y contenido, que son los campos en la bd
    $id="";
    $tipo="";
    $contenido="";

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
$consulta="SELECT * FROM archivos WHERE id=1";
$resultado=mysqli_query($conexion, $consulta);
while($fila=mysqli_fetch_array($resultado)){
   $id=$fila["id"];
   $tipo=$fila["tipo"];
   $contenido=$fila["contenido"];
}
echo "Id: " . $id . "<br>";
echo "Tipo: " . $tipo. "<br>";
echo "<img src='data:image/png; base64,". base64_encode($contenido)  . "'>" ;  //esto va visualizar, no la imagen o el archivo en si, sino un conjunto de caracteres 
//como decodifico eso?
//necesito un contenedor que me muestre lo q tengo ahi adentro 
//en el caso de imagenes <img src=...>
//funcion de php que diga q vamos a leer datos: data:image/png; el sistema de codificacion que en este caso es base64 ". base64_encode($contenido)  . " 
//ojo con las comillas 

?>

<div>
    


</div>
</body>
</html>