<?php
//aca necesitamos usar los objetos creados en Objetosblog
include_once("objetoblog.php");
class Manejoobjetos{
    private $conexion;

    public function __construct($conexion){
        //vamos a llamar un metodo dentro de esta clase que se encarga de establcer la conexion 
        $this->setconexion($conexion);

    }

    //metodo que se encarga de establecer la conexion a la bd 
    public function setconexion(PDO $conexion){
        $this->conexion=$conexion;
    }

    //ahora crear los metodos necesarios para obtener la inf almacenada en la bd 
    //es decir obtener entradas de blog e insertar nuevas entradas

    //obtener entradas de blog
    public function getcontenidoporfecha(){ // metodo que nos da la inf que hay en la bd 
        //creo una var y le digo q es un array
      $matriz=array();
      //creo una var que el objetivo es ir pasadno de registro a registro dentro de la matriz
      $contador=0;
$resultado=$this->conexion->query("SELECT * FROM CONTENIDO ORDER BY fecha DESC ");
//Recorrer la consulta e ir almacenando en el array 
//para ello usamos el Objetoblog
while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    //instanciamos el objeto
    $blog= new Objetoblog();
    //ahora usamos sus propiedades para crear una nueva entrda de blog 
    //con cada registro que nos devuelve el array asociativo que tenemos almacenado en $registro 
    //y despues ir almacenadno eso en $blog 

    $blog->setid($registro["id"]);
    $blog->settitulo($registro["titulo"]);
    $blog->setcomentario($registro["comentario"]);
    $blog->setimagen($registro["imagen"]);

    //ahora hay que almacenar en el array $matriz el primero objeto creado 
    //en que posicion quiero almacenar ej la primer posicion, la posicion la da $contador, que en el inicio es 0
//almaceno un objeto con sus prop establecidad en el array:
    $matriz[$contador]=$blog;

    //ahora debemos incrementar la var contador, para que en la siguiente vuelta de bucle, cree otro objeto y estableza sus prop y almacene en la posicion 1 
$contador++;

}
return $matriz;


    }

    //creo otro metodo
    //se encarga de introducir la inf en la bd 

    //le toy diciendo que $blog es del tipo Objetoblog, que es la clase creada 
    public function insertacontenido(Objetoblog $blog){
        $sql="INSERT INTO CONTENIDO (titulo, fecha, comentario, imagen) VALUES ('" . $blog->gettitulo() . "', '" . $blog->getfecha() . "' , '" . $blog->getcomentario() . "' , '" . $blog->getimagen() . "')";
//ejecutar la instruccion
$this->conexion->exec($sql);
    }

}




?>



