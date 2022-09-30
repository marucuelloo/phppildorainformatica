<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Blog</h2>
    <hr/>
    <?php
    //paso 8 creacion esta pagina, encargada de mostrar lo registrado
    //paso9 conexion a la bd
$conexion=mysqli_connect("localhost", "root", "", "blog");

//comprobar conexion
if(!$conexion){
    echo "La conexion ha fallado: " . mysqli_error();
    exit();
}
//paso 10 instruccion sql que rescate la informacion almacenada dentro de la tabla contenido
//Descenciente para que muestre de mayor a menor... la fecha mas moderna primero 
$consulta="SELECT * FROM CONTENIDO ORDER BY FECHA DESC"; 

//paso11 mostrar esos resultados 
if($resultado=mysqli_query($conexion, $consulta)){

    //este while se va leer tantas veces como entradas tengamos eb la bd 
    while($registro=mysqli_fetch_assoc($resultado)){
        echo"<h3>". $registro['titulo'] . "</h3>";
        echo"<h4>". $registro['fecha'] . "</h4>";
        echo"<div style='width:400px'>". $registro['comentario'] . "</div><br><br>";
        //para las imagenes, si el registro imagen es distinto de vacio(cuando exista imagen), me vas a leer lo de ese campo 
         if($registro['imagen']!=""){
         
             echo "<img src='../img/" . $registro['imagen']  . "'width='300px' />";

             //AL EJECUTAR NO SE XQ NO SE VE LA IMAGEN

            
         }
        echo "<hr/>";

    }
}

    ?>
    

</body>
</html>