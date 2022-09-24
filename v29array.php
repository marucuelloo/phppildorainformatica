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

    //array indexado que almacene los primeros 3 dias de la semana
    //en php te permite no colocar el indice, en otros lenguajes si hay que ponerlo. aunque si te sientes comodo poniendolos puedes hacerlo
    //no olvidar que los indices arrancar en 0. 
    //php entiende que los indices son 0 1 2
    $semana[]="Lunes";
    $semana[]="Martes";
    $semana[]="Miercoles";
    $semana[]="jueves";

    echo $semana[1] . "<br>";

//OTRA FORMA DE DECIR LO MISMO:
//quiero llamar a jueves:
   //asi esta en el video $semana2=array("lunes", "martes", "miercoles", "jueves");
   //pero hoy en dia es: 
   $semana2=["lunes", "martes", "miercoles", "jueves"];
   echo $semana2[3]. "<br>";
    echo "__________________________________________________________________________________________<br>";

    //array asociativo: identificar la posicion del array con un nombre
     //ojo es con => igual
    //estamos almacenando Maru en Nombre, es lo mismo que:
    //["Nombre"]=Maru
    //indicar esa posicion del array, no con indice, sino con nombre asociativo, en este caso nombre 
   //asi esta en el video:  $datos=array("Nombre"=>"Maru", "Apellido"=>"Cuello", "Edad"=>34);
    //pero la manera correcta hoy es 
    $datos=["Nombre"=>"Maru", "Apellido"=>"Cuello", "Edad"=>34];
   echo $datos["Apellido"]. "<br>";
    echo $datos["Nombre"]. "<br>";
    echo "__________________________________________________________________________________________<br>";


    //si yo llamo una variable igual que el array, lo sobrescribo
   //$datos="Maruuuuuuuuuuuuuuu";
//echo $datos;

//funcion predefinida para saber si es o no un array is_array
    //por defecto es true, sino puedo ponerle if(is_array($datos))==true{}
    // if(is_array($datos==true)){
    //     echo "es un array";
    // }else{
    //     echo "no es un array";
    // }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Recorrer los elementos de un array:
    //imprimir todos los valores de un array
    //a- array asociativo:
//tenemos que recorrer el array con un bucle desde el primer elemento hasta el ultimo
//clave y valor son 2 nombres que invento para identicar los nombres asociativos y sus valores 
foreach($datos as $clave=>$valor){
    echo "A $clave le corresponde $valor<br>";
    //a datos le corresponde completado
    //cada vuelta de bucle
   // a nombre le corresponde maru
   //a apellido le correspone cuello
   //a edad le corresponde 34
}
echo "__________________________________________________________________________________________<br>";

//b- array indexado:
//for(var que inicia el bucle; (lunes 0 martes 1 miercoles 2 jueves 3); i++ )
//for(desde la posicion 0, desde que i menor a 4 que es lo mismo que i=3 ,incremena la i )
for($i=0;$i<4;$i++){
    echo $semana[$i] . "<br>";
}

  //estamos recorriendo un bucle for indexado ($semana) usando un bucle for indexado
  echo "__________________________________________________________________________________________<br>";
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //cuando no sepas exactamnete cuantas posiciones tiene el array, xq vas agregando elementos:
//puedes decir menor que el array x ej: $i<count($semana)
for($i=0;$i<count($semana);$i++){
    echo $semana[$i] . "<br>";
}
echo "__________________________________________________________________________________________<br>";
//agregar un elemento mas al array: dejo vacio el []. lo agrega al final del array
$semana[]="viernes";
for($i=0;$i<count($semana);$i++){
    echo $semana[$i] . "<br>";
}
echo "__________________________________________________________________________________________<br>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//tenemos un array asociativo (nombre, apellido, edad )
// y queremos agregar un elemento mas ej pais
//array["la clave"="valor "]
//array["dato"]="completado"
$datos["Pais"]= "Argentina ";
foreach($datos as $clave=>$valor){
    echo "A $clave le corresponde $valor<br>"; 

}
echo "__________________________________________________________________________________________<br>";
/////////////////////////////////////////////////////////////////////////////////////
//ordenar un array
//ej: si a los dias de la semana los quiero ordenar alfabeticamente
//funcion predefinida sort(): ordena los elementos de un array
//despues de definir un array y antes de recorrerlo


sort($semana2);
for($i=0;$i<count($semana2);$i++){
    echo $semana2[$i] . "<br>";
}
echo "__________________________________________________________________________________________<br>";



   
    




?>
</body>
</html>