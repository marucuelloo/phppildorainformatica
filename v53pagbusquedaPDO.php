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
    $busqueda=$_GET["buscar"];

try{ //intenta conectar con la bd:
    $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root', "");

    //con esta linea le decimos que capture el objeto de tipo excepcion, para poder usar sus propieades y metodos
    //luego lo usamos en el catch.......GetMessage()
    // con esta linea le estamos diciendo que tome alas exepciones como objeto y podamos usar sus propiedades y metodos
//si no la ponemos, no puede capturar el error y no nos dara el mensaje del mismo 
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");
                                                                                   
    $sql="SELECT NOMBREARTÍCULO, SECCIÓN, PRECIO, PAÍSDEORIGEN FROM PRODUCTOS WHERE NOMBREARTÍCULO = ?";

    //paso 1 crear el objeto conexion $base
    //paso 2 llamar al metodo prepare y pasar por parametro la consulta. esto devuelve PDOstatement( $resultado)

    $resultado=$base->prepare($sql);
    
    //paso 3 pdostatement hay que ejecutarlo y asociarlo a un array para recorrerlo
//le digo que el marcador es igual a la variable donde se almacena lo que ingreso el usuaruo en el cuadro de texto
    $resultado->execute(array($busqueda));
//aoscie los nombre de los campos con los nombres de la sentencia sql 
    while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
        echo " Nombre de articulo: " . $registro['NOMBREARTÍCULO'] . " Seccion: " . $registro['SECCIÓN'] . " Precio: " . $registro['PRECIO'] . " Pais de origen: " . $registro['PAÍSDEORIGEN'] . "<br>";		
    }

    //cerrar pdpstatement

    $resultado->closeCursor();

    //lo que falta es reemplazar el ? por lo que ingresa el usuario, reemplazo el valor fijo "destornillador" por la variable $busqueda, que se creo antes del try usando el metodo get para el paso de datos


 }catch(exception $e){ //si no lo consigues,mate el proceso y msj de error:
die ('error: ' . $e->GetMessage());
 } finally {  //eliminar recursos que fuimos consumiento para q se vacie la memoria 
    $base=null;
 }
?>
</body>
</html>