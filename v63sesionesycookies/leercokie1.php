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
//la var cookie y especificar el nombre de la cokie,va mirar si hay uan cokie con ese nombre y si existe la leera
//en el caso que no exista dara un error 
//para probar esto debes ir borrando las cokies del historial 
//usamos la funcion isset para ver si la cokie fue creada o no 
if(isset($_COOKIE["pruebass"])){
    echo $_COOKIE["pruebass"];
}else{
    echo "La cookie no se ha creado";
}

?>
</body>
</html>