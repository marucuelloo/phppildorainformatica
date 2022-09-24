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
    //ya tenemos en 2 variables los datos q vienen del formulario 
     $bcod=$_POST["c_art"];
    $busquedaseccion=$_POST["seccion"];
    $bnom=$_POST["n_art"];
    $bpre=$_POST["precio"];
    $bfec=$_POST["fecha"];
    $bimp=$_POST["imp"];
    $busquedapaisorigen=$_POST["p_orig"];


try{ //intenta conectar con la bd:
    $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root', "");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");
          
    //modificamos la consulta sql:
   $sql="INSERT INTO PRODUCTOS(CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO, PRECIO, FECHA, IMPORTADO, PAÍSDEORIGEN) VALUES (:cart, :seccion, :nombre, :precio, :fecha, :imp, :paisor)";

    //no confundir el nombre del marcador secc, con el nombre de la variable php $busquedaseccion, con el nombre del cuadro de txt del frm. "seccion"

    //paso 1 crear el objeto conexion $base
    //paso 2 llamar al metodo prepare y pasar por parametro la consulta. esto devuelve PDOstatement( $resultado)

    $resultado=$base->prepare($sql);
    
    //paso 3 pdostatement hay que ejecutarlo y asociarlo a un array para recorrerlo
//le digo que el marcador es igual a la variable donde se almacena lo que ingreso el usuaruo en el cuadro de texto 
//$resultado->execute(array(":cart"=>$bcod, ":seccion"=>$busquedaseccion, ":nombre"=>$bnom, ":precio"=>$bpre, ":fecha"=>$bfec, ":imp"=>$bimp, ":paisor"=>$busquedapaisorigen));

  $resultado->bindParam(':cart', $bcod);
    $resultado->bindParam(':seccion', $busquedaseccion);
    $resultado->bindParam(':nombre', $bnom);
    $resultado->bindParam(':precio', $bpre);
    $resultado->bindParam(':fecha', $bfec);
    $resultado->bindParam(':imp', $bimp);
    $resultado->bindParam(':paisor', $busquedapaisorigen); 
   $resultado->execute();
     echo "registrado";
//aoscie los nombre de los campos con los nombres de la sentencia sql 
    // while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    //     echo " Nombre de articulo: " . $registro['NOMBREARTÍCULO'] . " Seccion: " . $registro['SECCIÓN'] . " Precio: " . $registro['PRECIO'] . " Pais de origen: " . $registro['PAÍSDEORIGEN'] . "<br>";		
    // }

    //cerrar pdpstatement

    $resultado->closeCursor();

    //lo que falta es reemplazar el ? por lo que ingresa el usuario, reemplazo el valor fijo "destornillador" por la variable $busqueda, que se creo antes del try usando el metodo get para el paso de datos

    



 }catch(exception $e){ //si no lo consigues,mate el proceso y msj de error:
    die ('error: ' . $e->GetMessage());

//nos da el codigo del error:
//echo "Código del error: " . $e->getCode() . "<br>";
//nos da la linea del erro:
//echo "Línea del error: " . $e->getLine();
 } finally {  //eliminar recursos que fuimos consumiento para q se vacie la memoria 
    $base=null;
 }
?>
</body>
</html>