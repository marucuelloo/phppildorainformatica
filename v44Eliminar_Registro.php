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

//CONSULTA: eliminar

$query="DELETE FROM PRODUCTOS WHERE CÓDIGOARTÍCULO='$cod'" ;
//para ejecutar la consulra mysqli_query(conexion, sql); pasa 2 argumentos: $conexion y donde tenemos almacenado la insntruccion sql
$resultados=mysqli_query($conexion, $query);
if($resultados==false){
    echo "Error en la consulta";
}else{

    //echo "Registro eliminado<br><br>";
    //echo mysqli_affected_rows($conexion);
    if(mysqli_affected_rows($conexion)==0){
        echo "no hay registros que eliminar con ese criterio";
    }else{
        echo "se ha eliminado " . mysqli_affected_rows($conexion) . " registro";
    }
 

}
//si yo ingreso un ar90 x ej que no existe, no es un error y x ende me devuelve registro eliminado, cuando en realidad no elimino nada
//lo mismo si le vuelvo a poner ar9 que ya esta eliminado, como no es error, em devuelve registro eliminado pero en realidad no elimino nada 
//para solucionar eso: funcion mysqli_affected_rows(conexion)
//pide como parametro la conexion y lo q hace es informarnos de cuantas filas dentro de la bd, cuantos registos se han visto afectados
//por instrucciones sql tipo insert, delete, update 


//cerrar la conexion
mysqli_close($conexion);

 

?>
</body>
</html>