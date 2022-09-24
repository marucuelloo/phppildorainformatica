<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- debemos crear un contenido php antes del contenido web, una especie de filtro para que solo deje ver eso a los usuarios que se han logueado correctamente -->
    <?php
    //reanudamos la sesion que se creo para el usuario logueado
    session_start();
    // si no hay algo almacenado en usuario:
    // si el usuario presiono el boton,y no hay usuario en bd
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");

    }


?>
    
    
    
    <h1>Bienvenidos Usuarios</h1>
    <?php
    //
    echo "Usuario:: " .$_SESSION["usuario"] . "<br>";
    ?>
    <p>Esto es informacion solo para usuarios registrados </p>
    <p><a href="usuariosregistrados1.php">Volver</a></p>
    <p><a href="cierre.php">Cerra Sesión</a></p>

    
</body>
</html>