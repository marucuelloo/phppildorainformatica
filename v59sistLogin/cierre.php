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
    //debemos crear un codigo que destruya la sesion abierta 
//reanudamos la sesion abierta:es impresindible para saber de que sesion estamos hablando 
    session_start();
    //cerramos la sesion:
    session_destroy();
    //dirigimos al login
    header("Location: login.php");

    //ahora a todas las paginas con acceso restringuido les incluimos un enlace a esta pag 

    
    
    ?>
</body>
</html>