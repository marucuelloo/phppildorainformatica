<?php
class Coche{
        //propiedades o caracteristicas. se usa public para declarar las propiedades. no var 
       //private es solo accesible desde la propia clase 
       //la cambio por protected para que la clase camion pueda hererdarla
        protected $ruedas;
        public $color;
        protected $motor;

        function  __construct(){   //metodo constructor 
        //nadie puede decir q mi coche tiene 7 ruedas x ejemplo, entonces debo encapsular:private
            $this->ruedas="4";
            $this->color="";
            $this->motor=1600;


        }
          //cuando a una propiedad la llame private, y necesito verla o modificarla:
//metodo getter... se llama get_ y lo q yo quiera por convencion. 
//setter modificar propiedades. getter solo visualizar propiedades 
function get_ruedas(){
    return $this->ruedas;
 }
 function get_motor(){
    return $this->motor;
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
        function establece_color($color_coche, $nombre_coche){
            //asignamos el argumento que le pasamos a la funcion $color_coche a la propiedad color de la clase coche
            $this->color=$color_coche;
            //concateno con lo q tengo almacenado en al propiedad color 
            echo "El color de " . $nombre_coche ." es " . $this->color . "<br>";
        }

    }
//extends se usa para que camion herede de coche

//va heredar todas las propiedades y todos los metodos
//no queremos el metodo establece color en camion. se usa sobreescritura de codigo en la herencia
//vuelvo a realizar el metodo con las condiicones que yo quiera 
    class Camion extends Coche{
        
        public $ruedas;
        public $color;
        public $motor;

        function  __construct(){   //metodo constructor lo dejo xq es distinto
            $this->ruedas="8";
            $this->color="gris";
            $this->motor=2600; 
       }

//este metodo fue una reestructuracion de codigo, y es un metodo setter
//modificamos las propiedades: cambiamos establece_color por set_color
        function set_color($color_camion, $nombre_camion){
                $this->color=$color_camion;
                echo "El color de " . $nombre_camion ." es " . $this->color . "<br>";
        }
        //quiero que el metodo arrancar agregue en camion, ya he arrancado 
        //en lugar de sobrescribir, usamos la instruccion parent::
        //le digo que en el metodo arrancar de la clase camion con el parent:: tiene que ejecuat
        //todo el metodo de la clase padre y luego agrego lo que yo necesito

        function arrancar(){
            parent:: arrancar();
            echo "camion arrancado";
        }
    
    }
  ?>