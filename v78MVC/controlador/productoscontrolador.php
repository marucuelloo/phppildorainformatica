<?php
require_once("modelo/productosmodelo.php");
//debo llamar a getproductos y ejecutar el constructor 

//instancio la clase productos_modelo para llamar al constructor:
$productos=new productos_modelo();

//creo una variable nueva que la igualo a $productos, que llama a getproductos, xq ya instancio la clase antes 
$matrizproductos=$productos->get_productos();


require_once("vista/productosver.php");
?>
