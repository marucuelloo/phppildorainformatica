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
    //creamos una variable y instanciamos la clase pdo, se hace llamanod al constructor de la clase
    //el constructor nos pide 3 argumentos  


//exepcion:
//en poo cuando hay un fallo en tiempo de ejecucion del programa se produce un EXCEPCION =fallo en tiempo de ejecucion
//no es algo de  sintaxis, error de otro tipo 
//se genera un objeto fallo, que tiene propiedades y metodos 
//bloque de codigo try catch: intenta ejecutar un codigo, si tiene exito perfecto pero so hay error captura (cath) y has lo q yo t digo 
 try{ //intenta conectar con la bd:
    $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root', "");
    echo "conexion ok!";
 }catch(exception $e){ //si no lo consigues, coge el objeto del error $e que tiene propiedades y metodos 
    //mate el proceso y msj de error:
die ('error: ' . $e->GetMessage());
 } finally {//y de cualquier forma, teniendo exito o no, ejecuta esto:
    //eliminar recursos que fuimos consumiento para q se vacie la memoria 
    $base=null;
 }
?>
</body>
</html>