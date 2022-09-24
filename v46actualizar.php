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
//creo una variable= $_GET(trasladar datos del form registro al Insertar_Registro)[nombre del cuadro de texto del formulario de donde viene la inf] 
           //name cuadro de texto del v43frmregistro.php
$cod=$_GET["c_art"];
$sec=$_GET["seccion"];
$nom=$_GET["n_art"];
$pre=$_GET["precio"];
$fec=$_GET["fecha"];
$imp=$_GET["importado"];
$por=$_GET["p_orig"];

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

//CONSULTA: nueva consulta update
$query="UPDATE PRODUCTOS SET CÓDIGOARTÍCULO= '$cod', SECCIÓN='$sec', NOMBREARTÍCULO='$nom', PRECIO='$pre', FECHA='$fec', IMPORTADO= '$imp', PAÍSDEORIGEN='$por' WHERE CÓDIGOARTÍCULO='$cod'" ;
//para ejecutar la consulra mysqli_query(conexion, sql); pasa 2 argumentos: $conexion y donde tenemos almacenado la insntruccion sql
$resultados=mysqli_query($conexion, $query);
if($resultados==false){
    echo "Error en la consulta";
}else{

    echo "Registro guardado<br><br>";
    //QUE ADEMAS ME MUESTRE LOS DATOS INGRESADOS: llamando a la variable creada al principio , que almacena el nombre del cuadro de txt
    echo "<table><tr><td>$cod</td></tr>";
    echo "<table><tr><td>$sec</td></tr>";
    echo "<table><tr><td>$nom</td></tr>";
    echo "<table><tr><td>$pre</td></tr>";
    echo "<table><tr><td>$fec</td></tr>";
    echo "<table><tr><td>$imp</td></tr>";
    echo "<table><tr><td>$por</td></tr></table>";

}


//cerrar la conexion
mysqli_close($conexion);

 

?>
</body>
</html>