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
//mira si la cookie idioma seleccionado ha sido creada, si ya ha sido creada
if(isset($_COOKIE["idiomaseleccionado"])){
    if($_COOKIE["idiomaseleccionado"]=="es"){
        //diriges a la pag en español
        header("Location:spanish.php");
//si el idioma es en
    }else if($_COOKIE["idiomaseleccionado"]=="en"){
        //diriges a la pag en ingles
        header("Location:english.php");

    }

}



?>
    <table width="25%" border="0" align="center">
        <tr>
            <td colspan="2" align="center"><h1> Elige el idioma: </h1></td>
</tr><tr>
    <!-- creamos un link de la bandera con la pagina creacoki y le pasamos por parametro el idioma, usanod la barra de direcciones, pasaos un parametro usando get -->
           <!-- pasamos por parametro que se llama idioma el valor es -->
           <!-- es decir cuando presiono la bandera española le pasa a crea coki un parametro que es es -->
    <td align="center"><a href="creacookie.php?idioma=es"><img src="..\practica1\img\spanol.jpg" width="180" heigt="100"></a></td>
    <td align="center"><a href="creacookie.php?idioma=en"><img src="..\practica1\img\ingles.jpg" width="180" heigt="100"></a></td>
</tr></table>

</body>
</html>