<?php

require "conexion.php";

//hereda de conexion
class Devuelveproducto extends Conexion{
    //puedo usar metodos y variables de la clase conexion, siempre q sean accesibles
    //es decir que no sean private

    public function __construct(){
        //llamo al constructor de la clase padre
        //tenemos jerarquia de herencia 
        //devuelve producto hereda el constructor de conexion 
        parent::__construct(); //1 conectamos con la bd 


    }

    public function get_productos(){
        //podemos usar conexiondb en la clase devuelveproductos gracias a que estamos heredando de la clase conexion 
        $resultado=$this->conexiondb->query("SELECT * FROM PRODUCTOS"); //2 hacemos una consulta sql 
        $productos=$resultado->fetch_all(MYSQLI_ASSOC);//almacenamos ese sql enun array asociativo
        return $productos;//arroje ese array


    }

}


?>