<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>
  <?php
include("conexion.php");
//creo una instruccion sql q me devuelva todos los registros que hay en la tabla datosusuarioa
//y quiero que los almacene en un array de objetos
//creo una variable conexiony usamos la variable $base que tiene almacenada la conexion para ejecutar una consulta 
//$conexion=$base->query("SELECT * FROM datosusuarios");
//almaceno ese resultado en un array de objetos 
//$registros=$conexion->fetcall(PDO::FETCH_OBJ);
//ESTAS DOS LNEAS SE SIMPLIFICAN ASI:
$registros=$base->query("SELECT * FROM datosusuarios")->fetchall(PDO::FETCH_OBJ);
  //es un arrau de objetos xq tienen sus propiedades: id, nombre, apellido, direccion 
  //x lo tanto cuando ingrerse x el array voy a tener el valor de esas propiedades
  //para cada uno de los registros 


  //si has pulsado el boton insertar
  if(isset($_POST["cr"])){

    //creo una var y q tome el parametro enviado por post en los cuadros de textos de insertar. busco el nombre del paraemtro para escribir igual 
    $nombre=$_POST["Nom"];
    $apellido=$_POST["Ape"];
    $direccion=$_POST["Dir"];
    $sql="INSERT INTO datosusuarios (nombre, apellido, direccion) VALUES (:nom, :ape, :dir)";
    $resultado=$base->prepare($sql);

 $resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));  
   //tengo que volver a la misma pagina para que actualice los datos que estoy insertando 
   header("Location: index.php");
  }
  

  ?>


<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
<form name="form2" action="<?php  echo $_SERVER['PHP_SELF'];?>  " method="post">
  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="primera_fila">Dirección</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   
		

<?php


//READ
//meto en un bucle el <tr> que quiero que inlcuya tantos registros como exitam
//$registros es el array donde tengo almacenados todos los objetos con todas las personas q hay en mi bd
//$persona es una variable que creo
//x cada objeto(que aca es persona) que hay dentro de este array repiteme el codigo
//ojo con la sintaxis xq en este caso mezcla php con html 
foreach($registros as $persona):?>

  <tr>
  <td><?php echo $persona->id?> </td>
  <td><?php echo $persona->nombre?> </td>
  <td><?php echo $persona->apellido?> </td>
  <td><?php echo $persona->direccion?> </td>

  <!-- como hago para pasar x url el id? luego de php agregao ? y el nombre de como quiero llamar a ese parametro  -->
  <!-- para que lo q va desp del igual sea dinamico entre etiquetas php imprima la propiedad id del objeto persona  -->
  <td class="bot"><a href="borrar.php?id=<?php echo $persona->id  ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
  
  <td class='bot'><a href="editar.php?id=<?php echo $persona->id  ?> & nom=<?php echo $persona->nombre ?> & ape=<?php echo $persona->apellido ?> & dire=<?php echo $persona->direccion ?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
</tr>  
<?php
endforeach;
?>



<tr>
	<td></td>
      <td><input type='text' name='Nom' size='10' class='centrado'></td>
      <td><input type='text' name='Ape' size='10' class='centrado'></td>
      <td><input type='text' name='Dir' size='10' class='centrado'></td>

      <!-- insertar no es button, es submit ya que pretendo que se envie un formulario que contruimos despues -->
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>    
  </table>

</form>

<p>&nbsp;</p>
</body>
</html>