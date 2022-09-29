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
    //paso4
//conexion a la bd
$conexion=mysqli_connect("localhost", "root", "", "blog");

//comprobar conexion
if(!$conexion){
    echo "La conexion ha fallado: " . mysqli_error();
    exit();
}
//paso5
//evaluar si la subida de imagen da error 
//imagen se llama name=imagen
if($_FILES['imagen']['error']){

    switch($_FILES['imagen']['error']){
    case 1: //error exceso de tamaño de archivo en php
            echo "El tamaño del archivo excede lo permitido por el servidor"; 
            break;
    case 2: //error tamaño archivo marcado desde el formulario
            echo "El tamaño del archivo excede 2 MB"; 
            break;
    case 3: //corrupcion de archivo.
        //esto es un error en la transmision ej: se corta internet, el servidor de bd se cae  
            echo "El envío de archivo se interrumpió"; 
            break;
    case 4: //no hay fichero 
            echo "No se ha enviado ningún archivo"; 
            break;
    }
}else{  //que tiene que hacer en el caso que la imagen se haya subido con exito 

    echo "Entrada subida con exito<br>";

    //si al presionar hay un nombre de imagen y no hay error ( ya que UPLOAD_ERR_OK o 0 es una constante que indica ausencia de error )
    //es decir, si esta todo bien: 
    if((isset($_FILES['imagen']['name'])&&($_FILES['imagen']['error']==UPLOAD_ERR_OK))){
             //paso6
        $destinoderuta="img/";
        //movemos del direcotorio temporal al directorio que querramos, en este caso la carpeta img 
        move_uploaded_file($_FILES['imagen']['tmp_name'], $destinoderuta . $_FILES['imagen']['name']);
        //mensaje si la imagen se guarda correctamente 
        echo "El archivo " . $_FILES['imagen']['name'] . "se ha copiado en el directorio de imagenes"; 

    }else{ //si no se puede guardar en el directorio 
        echo"El archivo no se ha copiado en el directorio de imagenes"; 
    }

}



//paso 7 intruccion sql insert into 
//en el values incluis lo que viene del formulario 

$eltitulo=$_POST['campo_titulo'];
//el campo fecha no esta en el formulario(entonces no podemos ir a buscar el nombre del campo), pero si en la base de datos
//queremos que en el camppo fecha se inserte el dia de hoy. esto lo rescatamos con la funcion date y podemos darle el formato que querramos 
date_default_timezone_set('America/Argentina/Buenos_Aires'); //tome la hora local
$lafecha = date("Y-m-d H:i:s");
$elcomentario=$_POST['area_comentarios'];

//ver como subir imagen al servidor si hay dudas
$laimagen=$_FILES['imagen']['name'];
//ahora GUARDA CON LA CONCATENACION 
$consulta= "INSERT INTO CONTENIDO(titulo, fecha, comentario, imagen) VALUES ('" . $eltitulo . "', '". $lafecha . "', '" . $elcomentario . "', 'i" . $laimagen . "')";
//ejecutar la instruccion sql 

$resultado=mysqli_query($conexion, $consulta);

//cerramos conexion
mysqli_close($conexion);

echo "<br> Se ha registrado el comentario con exito <br> <br> "; 


?>
</body>
</html>