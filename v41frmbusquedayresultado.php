<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <?php
 
    //TODO EN UNA MISMA PAG. PONGO EN EL HEAD <?php 
    //creo una funcion que incluye todo el codigo

    function ejecuta_consulta($labusqueda){
//borramos get xq eso era cuando venia de otra pagina $busqueda=$_GET["buscar"];
//la funcion no se ejecuta hasta que no es llamada
    

require ("v38datosconexion.php");

//abrimos la conexion:
$conexion=new mysqli($local_bd, $usuario, $contra);
//podemos presindir del nombre de la base de datos

  if(mysqli_connect_errno()){
       echo "Fallo al conectar con bbdd";
    exit();
  }

mysqli_select_db($conexion, $bd) or die("No se encuentra la base de datos");

//CONSULTA:
//en nombre articulo llamo la variable creada de busqueda que cree en la funcion
//debo agregar los comodines %, asi cuando busque x ej caballero me sale todo los productos que incluyen caballero
$query="SELECT * FROM PRODUCTOS WHERE  NOMBREARtÍCULO like '%$labusqueda%'" ;
//para ejecutar la consulra mysqli_query(conexion, sql); pasa 2 argumentos: $conexion y donde tenemos almacenado la insntruccion sql
$resultados=mysqli_query($conexion, $query);

 while($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
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


//cerrar la conexion

mysqli_close($conexion);
//podes tener una web con conexion a mas de una bd
    }


?>
</head>
<body>
<?php
//Necesitamos 3 cosas formulario, conexion y consulta a la bd 
//formulario: mas complejos
//al presionar el boton submit llame la funcion que acabo de crear  function ejecuta_consulta($labusqueda){}
//el frm en lugar de enviar la info a una pag diferente, hay que decirle que se envia a la misma pagina 
//creo una variable y lo igual al get de un termino html:buscar

//Para evitar que salga el mensaje de error en local al cargar la página antes de hacer la consulta basta con poner @ al principio de la línea 
//que genera el error, en este caso sería donde tienen definida la variable $mibusqueda, pongan @$mibusqueda = $_GET["buscar"]; y el error no saldrá.
@$mibusqueda=$_GET["buscar"]; 

//creo otra variable para decir que la info se envie a la misma pagina y no a otra
//IGUALO a $_server inidicar la pag del servidor que tiene que llamar. "PHP_SELF" Le  decimos que es llamar a ella misma 

$mipagina=$_SERVER["PHP_SELF"];

//ejecute la consulta cuandno la variable de busqueda no sea 0
if($mibusqueda!=NULL){
    ejecuta_consulta($mibusqueda);
}else {
    echo("<form action='" . $mipagina . "' method='get'>
    <label>Buscar:<input type='text' name='buscar'></label>

    <input type='submit' name='enviando' vale='dale!'>
    </form>");
} 
//La primera vez que se ejecute el if va dar 0, xq no va encontrar el buscar, y va ir al else... crea un formulario, cuya accion es llamar a $mipagina
//un cuadro de busqueda y un boton submit q permite recragra la pagina, al recargar ya hay un termino buscar
//


?>
</body>
</html>