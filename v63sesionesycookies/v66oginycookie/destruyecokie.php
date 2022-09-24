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
    //en este caso no estamos pasando el valor por parametro, pongo el idioma de manera manual 
setcookie("nombreusuario","maru", time()-1);
echo "cookie destruida";

?>
</body>
</html>