
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
    
//se encarga de gestionar las acciones entre el formulario de vista y los 2 arhivos de modelo 
//debe recoger la info del formulario e interactuando con manejo objeto debe ser capaz de introducir la inf en la bd 

include_once("..\modelo\objetoblog.php");
include_once("..\modelo\manejoobj.php");

try{
    $conexion=new PDO('mysql:host=localhost; dbname=blog', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     
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
        $destinoderuta="../img/";
        //movemos del direcotorio temporal al directorio que querramos, en este caso la carpeta img 
        move_uploaded_file($_FILES['imagen']['tmp_name'], $destinoderuta . $_FILES['imagen']['name']);
        //mensaje si la imagen se guarda correctamente 
        echo "El archivo " . $_FILES['imagen']['name'] . "se ha copiado en el directorio de imagenes"; 

    }else{ //si no se puede guardar en el directorio 
        echo"El archivo no se ha copiado en el directorio de imagenes"; 
    }

}

//el siguiente paso es rescatar la inf que el usuario ha ido introducienod en el formulario y con esa inf construir un objeto del tipo blog 
//creo una var instancia manejooob  y llamo a la conexion
$manejoobj= new Manejoobjetos($conexion);
//ahora creamos un objeto del tipo $blog para acceder a sus prop
$blog= new Objetoblog();
$blog->settitulo(htmlentities(addslashes($_POST["campo_titulo"]), ENT_QUOTES));
$blog->setfecha(Date("Y-m-d H:i:s"));
$blog->setcomentario(htmlentities(addslashes($_POST["area_comentarios"]), ENT_QUOTES));
$blog->setimagen($_FILES['imagen']['name']);

//con ese objeto pdoemos insertar esa inf en la bd 
$manejoobj->insertacontenido($blog);
echo "<br> Entrada de blog creada con exito <br>";

//nos falta rescatar las entradas de blog para ver en una web 









}catch(Exception $e){
         //die que mate cualqueir proceso 
         die("Error: " . $e->getMessage());
    echo "la linea del error es: " . $e->getLine();


}














?>
    
</body>
</html>

