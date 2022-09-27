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

require("modelo/paginacion.php");
?>
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


foreach($matrizpersonas as $persona):?>
<tr>
<td><?php echo $persona["id"]?> </td>
<td><?php echo $persona["nombre"]?> </td>
<td><?php echo $persona["apellido"]?> </td>
<td><?php echo $persona["direccion"]?> </td>

<!-- como hago para pasar x url el id? luego de php agregao ? y el nombre de como quiero llamar a ese parametro  -->
<!-- para que lo q va desp del igual sea dinamico entre etiquetas php imprima la propiedad id del objeto persona  -->
<td class="bot"><a href="modelo/borrar.php?id=<?php echo $persona["id"]  ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>

<td class='bot'><a href="modelo/editar.php?id=<?php echo $persona["id"] ?> & nom=<?php echo $persona["nombre"] ?> & ape=<?php echo $persona["apellido"] ?> & dire=<?php echo $persona["direccion"] ?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
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
    <form action="modelo/insertar.php" method='post'>
    <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>
</form>
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
</body>
</html>