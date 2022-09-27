<?php
//para no confundirse se usa poner model en la creacion de la clase 
class Personas_modelo{

    //creo 2 variables privadas. en una establezco la conexion y enla otra las personas 
    private $db;
    private $personas;


    //el constructor se encarga de conectar con la bd 
public function __construct(){
    //La sentencia require_once es idéntica a require excepto que PHP verificará si el archivo ya ha sido incluido y si es así, no se incluye (require) de nuevo.
    require_once("modelo/conexion.php");
//debo llamar al metodo estatico conexion creado en conexion.php
    //como es estatico, primero especifico la variable donde quiero almacenar este metodo lo igualo a la clase conectar :: llamo al metodo
$this->db=Conectar::conexion();

$this->personas=array();



}

//practica buena poner get
//este metodo se encarga de devolverlos la lista de productos 
public function get_personas(){
//agrego la paginacion para poder agregar el limit en la consulta 
require("paginacion.php");

$consulta=$this->db->query("SELECT * FROM datosusuarios LIMIT $empezardesde, $datosxpag" );
while ($filas=$consulta->fetch(PDO:: FETCH_ASSOC)){
    //ir recorriendo cada fila o registro del array consulta 
   $this->personas[]=$filas;
}
return $this->personas;
}

}

?>
