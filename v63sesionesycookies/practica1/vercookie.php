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

    //tiene que detectar que bandera selecciono el usuario 
    //si no hemos creado la cookie:
    if(!$_COOKIE["idiomaseleccionado"]){
        //dirige al usuario a la pagina de las banderas 
        header("Location:pag1.php");
        //si creamos la cookie y es es 
    }else if($_COOKIE["idiomaseleccionado"]=="es"){
        //diriges a la pag en español
        header("Location:spanish.php");
//si el idioma es en
    }else if($_COOKIE["idiomaseleccionado"]=="en"){
        //diriges a la pag en ingles
        header("Location:english.php");

    }


?>
</body>
</html>