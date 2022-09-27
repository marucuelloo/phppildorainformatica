<?php
require_once("conexion.php");
  //si has pulsado el boton insertar
  if(isset($_POST["cr"])){

    //creo una var y q tome el parametro enviado por post en los cuadros de textos de insertar. busco el nombre del paraemtro para escribir igual 
    $nombre=$_POST["Nom"];
    $apellido=$_POST["Ape"];
    $direccion=$_POST["Dir"];
    $sql="INSERT INTO datosusuarios (nombre, apellido, direccion) VALUES (:nom, :ape, :dir)";
    $resultado=$conexion->prepare($sql);

 $resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));  
   //tengo que volver a la misma pagina para que actualice los datos que estoy insertando 
   header("Location: index.php");
  }
  
?>