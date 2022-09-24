<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
table{
    width:300px;
    margin:auto;
    background-color:#FFC;
    border: 2px solid #F00;
    padding:5px;
}

td{
    text-align:center;

}


    </style>
</head>
<body>
<!-- //si complicamos la busqueda: un articulo que corresponda a una seccion y pais en particular. tenemos 2 parametros en la consulta sql  -->
    <form action="v56insertarpdo.php" method="post">
    <table>
         <tr><td>Código de artículo: </td><td><input type="text" name="c_art"></td></tr>
        <tr><td>Sección: </td><td><input type="text" name="seccion"></td></tr>
        <tr><td>Nombre del artículo: </td><td><input type="text" name="n_art"></td></tr>
        <tr><td>Precio: </td><td><input type="text" name="precio"></td></tr>
        <tr><td>Fecha: </td><td><input type="text" name="fecha"></td></tr>
        <tr><td>Importado: </td><td><input type="text" name="imp"></td></tr>
         <tr><td>País de origen: </td><td><input type="text" name="p_orig"></td></tr>
<tr><td colspan='2'><input type="submit" name="enviando" value="Dale">
</td></tr></table>
</form>

    
</body>
</html>