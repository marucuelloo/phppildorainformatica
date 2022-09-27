<?php

//entra en modelo ya que todo contacto con la bd entra dentro de modelo 

require_once("conexion.php");
$conexion=Conectar::conexion();
//__________________PAGINACION_________________________________
    //voy a crear una var para decir cuantos registros quiero ver por pag, para usar en el limit 
    $datosxpag=3;
    //creo otra var que pretende mostrar la pag en la q estamos al cargar por primera vez nuestra pag web 
        $pagina=1;

//todo lo que esta dentro del if, lo va ejecuatr siempre q hayas pasado el parametro pagina o la url. es decir siempre q el usuario haya hecho click en el link 
//si no ha hecho click, ejecuta el else 
    if(isset($_GET["pagina"])){
            $pagina=$_GET["pagina"];
    }else{  ///si no hiciste click en las paginas:  //que en un comentario dice que lo podes borrar y no pasa nada xq ya arriba pusiste q $pagina=1
        $pagina=1;
    }
  

    //voy a crear otra variable me va almacenar el registro desde el cual quiero empezar a mostrar los resultados 
    //ej pag 1..el indice me da 0, si es pag 3 (3-1)*3=6, a partir del registro 6 7 8 se mostrara en la pag
    $empezardesde=($pagina-1)*$datosxpag;

//esta primera instruccion es para saber cuantos registros va devolver la consulta y hacer los calculos necesarios
    $sql="SELECT * FROM datosusuarios";
$resultado=$conexion->prepare($sql);
$resultado->execute(array());
//indica el numero de filas: la funcion rowcount. sabemos el numero de registros 
$numerodefilas=$resultado->rowCount();
//creo una var y divido el numero de regitros por la cant de datos por pag 
//en este caso 12/3=4
//la funcion ceil lo q hace es redondear el resultado . si me diera 3.7 redondea a 4 paginas 
$totalpaginas=ceil($numerodefilas/$datosxpag);
//___________________________________________________________________________TERMINA PAGINACION


?>