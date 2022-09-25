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

//__________________PAGINACION_________________________________
    //voy a crear una var para decir cuantos registros quiero ver por pag, para usar en el limit 
    $datosxpag=3;
    //creo otra var que pretende mostrar la pag en la q estamos al cargar por primera vez nuestra pag web 
        $pagina=1;

//todo lo que esta dentro del if, lo va ejecuatr siempre q hayas pasado el parametro pagina o la url. es decir siempre q el usuario haya hecho click en el link 
//si no ha hecho click, ejecuta el else 
    if(isset($_GET["pagina"])){
            $pagina=$_GET["pagina"];
    }else{  ///si no hiciste click en las paginas:  //que en un comentario dice que lo podes borrar y no pasa nada xq ya arriba pusiste q $pagina=1
        $pagina=1;
    }
  

    //voy a crear otra variable me va almacenar el registro desde el cual quiero empezar a mostrar los resultados 
    //ej pag 1..el indice me da 0, si es pag 3 (3-1)*3=6, a partir del registro 6 7 8 se mostrara en la pag
    $empezardesde=($pagina-1)*$datosxpag;

//esta primera instruccion es para saber cuantos registros va devolver la consulta y hacer los calculos necesarios
    $sql="SELECT * FROM datosusuarios";
$resultado=$base->prepare($sql);
$resultado->execute(array());
//indica el numero de filas: la funcion rowcount. sabemos el numero de registros 
$numerodefilas=$resultado->rowCount();
//creo una var y divido el numero de regitros por la cant de datos por pag 
//en este caso 12/3=4
//la funcion ceil lo q hace es redondear el resultado . si me diera 3.7 redondea a 4 paginas 
$totalpaginas=ceil($numerodefilas/$datosxpag);
//___________________________________________________________________________TERMINA PAGINACION



//creo una instruccion sql q me devuelva todos los registros que hay en la tabla datosusuarioa
//y quiero que los almacene en un array de objetos
//creo una variable conexiony usamos la variable $base que tiene almacenada la conexion para ejecutar una consulta 
//$conexion=$base->query("SELECT * FROM datosusuarios");
//almaceno ese resultado en un array de objetos 
//$registros=$conexion->fetcall(PDO::FETCH_OBJ);
//ESTAS DOS LNEAS SE SIMPLIFICAN ASI:

//para paginacion: debo agregar un limit 
$registros=$base->query("SELECT * FROM datosusuarios limit $empezardesde, $datosxpag")->fetchall(PDO::FETCH_OBJ);
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
      
      <tr><td>
      <?php
      //agrego una celda mas en la tabla para q los numeros de la paginacion aparezcan centrados

//________________PAGINACION:_____________________________________________________________
//QUEREMOS DECIRLE Q VAYA DE 1 A LA PAGINA Q TENGA EL ULTIMO REGISTRO 
//aca se crean los vinculos 
for($i=1; $i<=$totalpaginas; $i++){
//yo necesito que $i en el for sea un vinculo y me lleve a la pag clickeada con sus respectivos resultados. agrego <a href...
//ya vimos como pasar datos a la url cuando hacemos click en un vinculo: ? y una variable en este caso: pagina
//lo q consigo es q el dato viaje a la url con el nombre de la var pagina . guarda con la concatenacion
echo "<a href='?pagina=" . $i . "'> " . $i . "</a>  ";

//ahora lo q hay q hacer es captar el dato de la url y en funcion de ese dato que esto pagine:

}

?></td></tr></table></form>
<p>&nbsp;</p>
<?php
$totalpaginas=ceil($numerodefilas/$datosxpag);
echo "Número de registros de la consulta: " . $numerodefilas . "<br>";
echo "Mostramos " . $datosxpag . " registros por página". "<br>";
echo "Mostrando la pagina " . $pagina . " de ". $totalpaginas. "<br><br>";
?>
</body>
</html>