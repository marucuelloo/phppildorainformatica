<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Creamos una clase. la primera letra debe estar en mayuscula por convencion en las clases 
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

    

    //instanciamos una clase
    //y lo que estamos haciendo en llamar al constructor Coche()

    $renualt=new Coche(); //le estas dando estado inicial al objeto o instancia
    $ford=new Coche();
    $fiat=new Coche();
    
    
    //queremos que la instancia x ejemplo gire
//quiero que fiat gire: nombre de la intancia(fiat) -> el nombre del metodo(girar()). me devuelve estoy girando. no pongo echo xq ya estaba en la funcion 
    $fiat->girar();
    //quiero la cant de ruedas, nombre de la instanciaa -> nombre de la propiedad. es sin (). agrego que echo para que imprima el valor
    echo $renualt->ruedas;



    //////video 24
    echo "__________________________________________________________________________________________________________<br>";
    $renualt->establece_color("rojo", "Renault");
    $ford->establece_color("blanco", "Ford");
    
    




    ?>
</body>
</html>