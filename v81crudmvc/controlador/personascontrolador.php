<?php
require_once("modelo/personasmodelo.php");
//debo llamar a getpersonas y ejecutar el constructor 

//instancio la clase Personas_modelo para llamar al constructor:
$personas=new Personas_modelo();

//creo una variable nueva que la igualo a $personas, que llama a getpersonas, xq ya instancio la clase antes.
$matrizpersonas=$personas->get_personas();


require_once("vista/personasver.php");
require_once("modelo/insertar.php");
?>




