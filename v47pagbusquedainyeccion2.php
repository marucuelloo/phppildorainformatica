<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width:50%;
            border: 1px dotted #FF0000;
            margin:auto;
       }



    </style>
</head>
<body>
    <?php
    //en este caso tenemos una pagina para el formulario y otra para el resultado
//creo una variable y le digo que es igual a lo que el usuario haya puesto en el cuadro de texto buscar
//metodo $_GET almacena lo que te estoy pasando x la url del cuadro de texto buscar
    $usu=$_GET["usuario"];
    $contrasena=$_GET["contra"];
    //ahora hay que usar la var $busqueda en la sentencia sql 

require ("v38datosconexion.php");

//abrimos la conexion:
$conexion=new mysqli($local_bd, $usuario, $contra);
//podemos presindir del nombre de la base de datos

  if(mysqli_connect_errno()){
       echo "Fallo al conectar con bbdd";
    exit();
  }

mysqli_select_db($conexion, $bd) or die("No se encuentra la base de datos");

//CONSULTA:
//en nombre articulo llamo la variable creada de busqueda que cree con el metodo get
//debo agregar los comodines %, asi cuando busque x ej caballero me sale todo los productos que incluyen caballero
$query="SELECT * FROM USUARIOS WHERE USUARIO= '$usu' and CONTRA='$contrasena'" ;
//muestra la consulta sql
echo "$query<br><br>";


//para ejecutar la consulra mysqli_query(conexion, sql); pasa 2 argumentos: $conexion y donde tenemos almacenado la insntruccion sql
$resultados=mysqli_query($conexion, $query);

 while($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
    echo "Bienvenido $usu<br> Estos son tus datos: ";
echo "<table><tr><td>";
 echo $fila['usuario'] . "</td><td>";
 echo $fila['contra']. "</td><td>";
 echo $fila['telefono']. "</td><td>";
 echo $fila['direccion']. "</td><td>";

echo "<br>";
echo "<br>";

}


//cerrar la conexion

mysqli_close($conexion);
//podes tener una web con conexion a mas de una bd



?>
</body>
</html>