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

    //si queremos que nos devuelva un solo pais en concreto, pasamos un parametro 
    public function get_productos($dato){
        $sql="SELECT * FROM PRODUCTOS WHERE PAÍSDEORIGEN='" . $dato ."'";
        //creo una variable y le digo q prepare la consulta
        $sentencia=$this->conexiondb->prepare($sql);
        //ejecutamos el array
        $sentencia->execute(array());
        //leer el array y almacenarlo en reusltado 
        //le decimos que es un array asociaivo
        $resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        //cerrar la tabla virtual 
        $sentencia->closeCursor();
        //resultado
        $this->conexiondb=null;
        return $resultado;
        //borrar datos de la memoria 
     
        ////////////////////////////////////////////////////////////
        //usando mysqli
        // //podemos usar conexiondb en la clase devuelveproductos gracias a que estamos heredando de la clase conexion 
        // $resultado=$this->conexiondb->query("SELECT * FROM PRODUCTOS WHERE PAÍSDEORIGEN='". $dato ."'"); //2 hacemos una consulta sql 
        // $productos=$resultado->fetch_all(MYSQLI_ASSOC);//almacenamos ese sql enun array asociativo
        // return $productos;//arroje ese array
    }
}