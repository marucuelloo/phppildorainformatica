<?php

require"config.php";

class Conexion{
    //creo una variable donde voy a guardar la conexion
    protected $conexiondb;
    //creo el constructor:
    public function __construct(){
        $this->conexiondb= new mysqli(DB_HOST, DB_USUARIO, DB_CONTRA, DB_NOMBRE);
        //mensaje si falla la conexion 
        if($this->conexiondb->connect_errno){
            echo "Fallo al conectar MySql: " . $this->conexiondb->connect_error;
            return;
        }
        //uso de caracteres 
        $this->conexiondb->set_charset(DB_CHARSET);
    }

}



?>