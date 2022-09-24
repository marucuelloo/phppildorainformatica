<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>
<?php
include("conexion.php");

//si no has presiona el boton actualizar, lee $_get
//isset comprueba si has presionado el boton
if(!isset($_POST["bot_actualizar"])){
//el valor que estamos pasando corresponde al parametro creado enel href del boton actualizar en el index. 
$id=$_GET["id"];
$nom=$_GET["nom"];
$ape=$_GET["ape"];
$dir=$_GET["dire"];
}else{            //si has presionado el boton actualizar:

  //creo otras var q las llme igual y le paso por parametro el name del input de cada campo creado mas abajo

$id=$_POST["id"];
$nom=$_POST["nom"];
$ape=$_POST["ape"];
$dir=$_POST["dir"];
//no olvidate el criterio xq sino me modificar todos los registros de mi base 
$sql="UPDATE datosusuarios SET nombre= :nom , apellido= :ape, direccion= :dir where id= :id";
$resultado=$base->prepare($sql);
$resultado->bindParam(':id', $id);
$resultado->bindParam(':nom', $nom);
$resultado->bindParam(':ape', $ape);
$resultado->bindParam(':dir', $dir);
$resultado->execute();

//luego quiero q me regrese al index con los datos ya modificados 
header("Location:index.php");





}
//ya tengo en las 4 variables $ el valor almacenado que le llega x url 
//ahora quiero que se vea en los cuadros de textos, debo localizar los cuadros de texto y escribir el dato en su interior 
//buscamos los input y para escribir un valor usamos value=


//tenemos que decirle al formulario que envie el formulario a la propia pagina.. en el action 
//action="<?php  echo $_SERVER['PHP_SELF']
//se va enviar a traves del metodo post, si usaramos get usariamos la url y los valores de arriba se sobrescribirian 
//entonces debemos decir del index al editar get, desde la modificacion al presionar actualizar post 
//una vez q la inf enviada x el get ya se lleno en los cuadros de textos, y presiono actualizar esa inf no debe leerse, xq la inf del formulari la envio por post


?>
<p>
 
</p>
<p>&nbsp;</p>

<form name="form1" method="post" action="<?php  echo $_SERVER['PHP_SELF'];?> ">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
<!-- hidden es cuadro de texto oculto, existe pero el usuario no lo ve  -->
      <input type="hidden" name="id" id="id" value="<?php echo $id ?>"></td> ></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $nom ?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $ape ?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?php echo $dir ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>