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


require ("v38datosconexion.php");

//abrimos la conexion:
$conexion=new mysqli($local_bd, $usuario, $contra);

    //en este caso tenemos una pagina para el formulario y otra para el resultado
//creo una variable y le digo que es igual a lo que el usuario y contra que haya puesto en el cuadro de textoel usuario
//metodo $_GET almacena lo que te estoy pasando x la url del cuadro de texto buscar
//mysqli_real_escape_string() : sirve para evitar la inyeccion: atraves de no permitir el ingreso de caracteres especiales, solo texto y numeros. 
//colocamos esto despues de la conexion, ya que la funcion mysqli_real_escape_string() usa la variable conexion como argumento.
$usu2=mysqli_real_escape_string($conexion, $_GET["usuario"]);
$contrasena2=mysqli_real_escape_string($conexion, $contrasena2=$_GET["contra"]);



  if(mysqli_connect_errno()){
       echo "Fallo al conectar con bbdd";
    exit();
  }

mysqli_select_db($conexion, $bd) or die("No se encuentra la base de datos");

//CONSULTA:
//en nombre articulo llamo la variable creada de busqueda que cree con el metodo get
//debo agregar los comodines %, asi cuando busque x ej caballero me sale todo los productos que incluyen caballero
$query="DELETE FROM USUARIOS WHERE USUARIO='$usu2' and CONTRA='$contrasena2'" ; //1 almacenamos la instruccion sql 
//la inyeccion viene desde las variables $usu2 y $contrasena2

//muestra la consulta sql
echo "$query<br><br>";
//para ejecutar la consulra mysqli_query(conexion, sql); pasa 2 argumentos: $conexion y donde tenemos almacenado la insntruccion sql

//video 48
//necesitamos saber si esta consulta sql delete encuentra registros para borrar o no los encuentra:
//hay 2 funciones: mysqli_num_rows() devuelve por medio de un select si hay o no registros, pero delete no devuele registros solo lo q hace es actuar
//otra funcion mysqli_affected_rows() detectar si hay filas afectadas enla ultima consulta
mysqli_query($conexion, $query); //2 ejecutamos instruccion sql 
if(mysqli_affected_rows($conexion)>0){
    echo "Baja procesada";
}else{
    echo "no se ha encontrado usuario";
}

//mysqli_addslashes() evita los caracteres mas usados en la inyeccion, el mas comun '. pero existen mas caracteres como & y si los toma
//al igual que deja ingresar el codigo ascii de los caracteres. no asi la funcion mysqli_real_escape_string()






//primer if que hicimos, util de referencia video 47
// if(mysqli_query($conexion, $query)){
//     echo "Baja procesada";
// }
echo "<br>";
echo "<br>";

//cerrar la conexion

mysqli_close($conexion);
//podes tener una web con conexion a mas de una bd



?>
</body>
</html>