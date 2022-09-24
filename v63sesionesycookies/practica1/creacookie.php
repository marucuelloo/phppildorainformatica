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

    //creamos la cookie (nombrecookie, valor: en este caso recibo el parametro creado en el formulario :idioma, duracion en seg )
    //la pag creacokie con el $_GET lo que hace es rescatar lo que viene cone l parametro idioma: es o en 
    setcookie("idiomaseleccionado", $_GET["idioma"], time()+86400);
 //decirle que hacer, que nos rediriga a otra pagina 
 header("Location:vercookie.php");

?>
</body>
</html>