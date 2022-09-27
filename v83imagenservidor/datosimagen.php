<?php
//determinar el codigo que captura la imagen que estamos enviando desde el index 

//recibimos los datos de la imagen 
//cuando queremos rescatar la inf que estamos recibiendo desde otro archivo usamos $_FILES es variable o array superglobal 
//va almacenar varios datos de la imagen que le estamos enviando: name, type, size, tmp_name(inf del directorio temporal, que es donde se almacena antes de pasara al sevridor), error 

//entre [nombre del input type="file"][lo q quiero guardar de la imagen]

$nombreimg=$_FILES['imagen']['name']; 
$tipoimg=$_FILES['imagen']['type']; 
$tamanoimg=$_FILES['imagen']['size']; 
$archivotemporal=$_FILES['imagen']['tmp_name'];

//me imprime el nombre del archivo que se va guardar
echo $_FILES['imagen']['name'] ."<br>" ;
//me imprime el tipo de archivo 
echo $tipoimg=$_FILES['imagen']['type']."<br>" ;
//Para comprobar la ruta de tu carpeta de servidor local imprime en pantalla la ruta:
echo  $carpeta_server = $_SERVER["DOCUMENT_ROOT"];
echo "<br>";
//Debe aparecer algo parecido : C:/xampp/htdocs



//incluyo en un if que evalue el tamaño de la imagen que estamos subiendo 
//1000000 byte es 1 mega 

if($tamanoimg<=1000000 ){


    //coloco otro if, para luego de evaluar el tamaño, solo suba imagenes
    //if($tipoimg=="image/jpeg" || $tipoimg=="image/jpg" || $tipoimg=="image/png" || $tipoimg=="image/gif" )   este if no me funciono y copie uno de los comentarios que admite cualquier tipo de img
        if ( !strcmp ( ( explode( "/", $tipoimg ) )[0],"image")){


//directorio o carpeta en el servidor donde queremos guardar la imagen:
//ruta de la carpeta destino en servidor 
$carpetadestino=$_SERVER['DOCUMENT_ROOT'] .'/img/';

//debemos decirle que pase la img del directorio temporal a $carpetadestino 
//movemos la imagen del directorio temporal al directorio escogido 
move_uploaded_file($archivotemporal, $carpetadestino.$nombreimg);
    }else{
        echo"solo admite imagenes  ";
    }
 
    

}
else{
    echo"el tamaño es demasiado grande ";
}



//creo una conexion sencilla a la bd: se puede con mysqli, pdo o poo
require("datosconexion.php");

$conexion=new mysqli($local_bd, $usuario, $contra);
//podemos presindir del nombre de la base de datos

//no logramos conexion
  if(mysqli_connect_errno()){
       echo "Fallo al conectar con bbdd";
    exit();
  }

//indicamos la bd con la que queremos conetar: y 
 //en el caso que pongamos mal el nombre de la bd 
mysqli_select_db($conexion, $bd) or die("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");

//consulta llama a la nueva tabla productos. ya importada en el admin
//no importa si mayusucula o minuscula pero igual escrito, ojo con las tildes 
//no es insert into xq esto me agrega un campo nuevo en la tabla, y lo q yo quiero es q me edite un campo ya guardado
$sql="UPDATE PRODUCTOS SET FOTO='$nombreimg' WHERE CÓDIGOARTÍCULO='AR01'";
//para ejecutar la consulra mysqli_query(conexion, sql); pasa 2 argumentos: $conexion y donde tenemos almacenado la insntruccion sql
$resultados=mysqli_query($conexion, $sql);










?>