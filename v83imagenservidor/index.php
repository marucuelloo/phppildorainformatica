<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            margin:auto;
            width: 450px;
            border: 2px dotted #FF0000;
        }
    </style>
</head>
<body>

<!-- enctype indicamos el tipo de archivo que vamos a trabajar, si no podemos nada por defecto toma q es archivo tipo texto -->
    <form action="datosimagen.php" method="post" enctype="multipart/form-data">
<table> 
    <tr><td>
        <label for="imagen">Imagen:</label></td>
        <!-- //boton que nos permita buscar en nuetro directorio de archivo  file es examinar en el tipo -->
        <td> <input type="file" name="imagen" size="20"></td></tr>
        <tr><td colspan="2" style="text-align:center"><input type="submit" value="enviar"></td></tr></table>




</table>
</form>
</body>
</html>