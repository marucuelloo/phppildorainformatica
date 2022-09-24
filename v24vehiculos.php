<?php
class Coche{
        //propiedades o caracteristicas. se usa public para declarar las propiedades. no var 
        public $ruedas;
        public $color;
        public $motor;

        //funciones o metodos. son sinonimos si la funcion esta dentro de una clase 
        //los objetos deben estar en un estado inicial. creamos un constructor. antes tenia  el mismo nombre de la clase. hoy se llama __construct()
        //metodo constructor y se encarga de darle un estado inicial al objeto
        //el metodo constructor puede recibir parametros

        function  __construct(){   //metodo constructor 

            //this es hacer referencia a la propia clase 
        
            $this->ruedas="4";
            $this->color="";
            $this->motor=1600;


        }

        function arrancar(){
            echo "Estoy arrancando <br>";

        }
        function girar(){
            echo "Estoy girando <br>";
        }
        function frenar(){
            echo "Estoy frenando <br>";
        }

        //metodo que recibe un parametro y cambia una propiedad del objeto coche:
        //asignar color a cada instancia
        //creo una funcion y la novedad es que le paso un parametro $color_coche
        function establece_color($color_coche, $nombre_coche){
            //asignamos el argumento que le pasamos a la funcion $color_coche a la propiedad color de la clase coche
            $this->color=$color_coche;
            //concateno con lo q tengo almacenado en al propiedad color 
            echo "El color de " . $nombre_coche ." es " . $this->color . "<br>";
        }

    }

    class Camion{
        
        public $ruedas;
        public $color;
        public $motor;

        function  __construct(){   //metodo constructor 

            //this es hacer referencia a la propia clase 
        
            $this->ruedas="8";
            $this->color="gris";
            $this->motor=2600;


        }

        function arrancar(){
            echo "Estoy arrancando <br>";

        }
        function girar(){
            echo "Estoy girando <br>";
        }
        function frenar(){
            echo "Estoy frenando <br>";
        }
       
    }?>