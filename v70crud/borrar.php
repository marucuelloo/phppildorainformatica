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
    //conectamos con la bd 
    include("conexion.php");
    //este archivo va recibir un parametro x la url
    //creo ua variable y le doy un nombre al argumento que va venir por la url a traves de $_GET
    $id=$_GET["id"];
    //llamo la variable $base que es la q ejecuta la conexion y mle decimos que ejecute una consulta 
    $base->query("DELETE FROM datosusuarios WHERE ID='$id'");
    //redirigimos a la pagina que estabamos visitando 
    header("Location:index.php");
    



?>

    
</body>
</html>