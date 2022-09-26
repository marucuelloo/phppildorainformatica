<?php
//para no confundirse se usa poner model en la creacion de la clase 
class productos_modelo{

    //creo 2 variables privadas. en una establezco la conexion y enla otra los productos 
    private $db;
    private $productos;


    //el constructor se encarga de conectar con la bd 
public function __construct(){
    //La sentencia require_once es idéntica a require excepto que PHP verificará si el archivo ya ha sido incluido y si es así, no se incluye (require) de nuevo.
    require_once("modelo/conexion.php");
//debo llamar al metodo estatico conexion creado en conexion.php
    //como es estatico, primero especifico la variable donde quiero almacenar este metodo lo igualo a la clase conectar :: llamo al metodo
$this->db=Conectar::conexion();

$this->productos=array();



}

//practica buena poner get
//este metodo se encarga de devolverlos la lista de productos 
public function get_productos(){

$consulta=$this->db->query("SELECT * FROM PRODUCTOS");
while ($filas=$consulta->fetch(PDO:: FETCH_ASSOC)){
    //ir recorriendo cada fila o registro del array consulta 
   $this->productos[]=$filas;
}
return $this->productos;
}

}

?>
