<?php
//determinar el codigo que captura la imagen que estamos enviando desde el index 

//recibimos los datos de la imagen 
//cuando queremos rescatar la inf que estamos recibiendo desde otro archivo usamos $_FILES es variable o array superglobal 
//va almacenar varios datos de la imagen que le estamos enviando: name, type, size, tmp_name(inf del directorio temporal, que es donde se almacena antes de pasara al sevridor), error 

//entre [nombre del input type="file"][lo q quiero guardar de la imagen]

$nombrearchivo=$_FILES['archivo']['name']; 
$tipoarchivo=$_FILES['archivo']['type']; 
$tamanoarchivo=$_FILES['archivo']['size']; 
$archivotemporal=$_FILES['archivo']['tmp_name'];

//me imprime el nombre del archivo que se va guardar
echo $_FILES['archivo']['name'] ."<br>" ;
//me imprime el tipo de archivo 
echo $tipoimg=$_FILES['archivo']['type']."<br>" ;
//Para comprobar la ruta de tu carpeta de servidor local imprime en pantalla la ruta:
echo  $carpeta_server = $_SERVER["DOCUMENT_ROOT"];
echo "<br>";
//Debe aparecer algo parecido : C:/xampp/htdocs



//incluyo en un if que evalue el tamaño de la imagen que estamos subiendo 
//1000000 byte es 1 mega 

if($tamanoarchivo<=1000000 ){

//directorio o carpeta en el servidor donde queremos guardar la imagen:
//ruta de la carpeta destino en servidor 
$carpetadestino=$_SERVER['DOCUMENT_ROOT'] .'/img/';

//debemos decirle que pase la img del directorio temporal a $carpetadestino 
//movemos la imagen del directorio temporal al directorio escogido 
move_uploaded_file($archivotemporal, $carpetadestino.$nombrearchivo);
    

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


//hay que escoger el archivo desde el index y convertirlo a byte 

//paso 1
//debemos usar una funcion de php fopen: le decimos a nuestro codigo cual es el archivo objetivo 
//archivo_objetivo=fopen(ruta, permiso)
//q es el permiso: solo lectura, lectura y escritura. vimos en la pag q solo lectura es "r"

$archivo_objetivo=fopen($carpetadestino . $nombrearchivo, "r");

//paso 2
//fread lo q hace es leer los bytes que forman esa imagen y los almacena en una var 
//contenido_bytes_archivo=fread(archivo_objetivo, tamaño)

$contenido=fread($archivo_objetivo, $tamanoarchivo);
//esta formula en $archivo_objetivo tiene una ruta y usa /, debo usar addslashes para que no me de error, escape de /
$contenido=addslashes($contenido);
//paso 3
//cerrar

fclose ($archivo_objetivo);

//paso 4. hacer la consulta a la bd
// es un insert into y tenemos todo en variables, la mas importante es contenido que es el tipo blob

$sql= "INSERT INTO ARCHIVOS(id, nombre, tipo, contenido) VALUES (0, '$nombrearchivo', '$tipoarchivo', '$contenido')";

$resultados=mysqli_query($conexion, $sql);

//esto realizado hasta aca no devuelve nada en pantalla. entonces hacemos

if(mysqli_affected_rows($conexion)>0){
    echo "se ha insertado el registro con exito";
}else{
    echo "no se ha podido insertar el registro";
}









?>