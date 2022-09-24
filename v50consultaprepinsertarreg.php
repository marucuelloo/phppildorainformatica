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
    $c_art=$_GET["c_art"];
    $secc=$_GET["seccion"];
    $n_art=$_GET["n_art"];
    $pre=$_GET["precio"];
    $imp=$_GET["importado"];
    $fec=$_GET["fecha"];
    $p_orig=$_GET["p_orig"];
    //ahora hay que usar la var $... en la sentencia sql 

require ("v38datosconexion.php");

//abrimos la conexion:
$conexion=new mysqli($local_bd, $usuario, $contra);

  if(mysqli_connect_errno()){
       echo "Fallo al conectar con bbdd";
    exit();
  }

mysqli_select_db($conexion, $bd) or die("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");

//paso 1 
//crear una instruccion/sentencia sql pero con la diiferencia de que en estas consultas hay que sustituir el criterio x ?
//almacenamos esa instruccion en una variable 

//creamos tantos interrogantes como campos tiene la consulta, en este caso 7
$sql="INSERT INTO PRODUCTOS (CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO, PRECIO, FECHA, IMPORTADO, PAÍSDEORIGEN) VALUES (?,?,?,?,?,?,?)";

//paso 2
//preparamos la consulta con la funcion mysqli_prepare(). pide 2 parametros: objeto conexion y la sentencia sql
//$resultado=mysqli_prepare($conexion, $sql). la funcion devuelve objeto del tipo mysqli_stmt. mysqli_stmt importante! $resultado1=mysqli_stmt
$resultado1=mysqli_prepare($conexion, $sql);

//paso 3
//unir los parametros a la sentencia sql. de esto se encarga la funcion: mysqli_stmt_bind_param(). devuelve true(si se ejecuta correctamente ) o false (si hay error)
//requiere 3 parametros: -el objeto mysqli_stmt(devuelto por mysqli_prepare)>>>>>$resultado1
                       //- el tipo de dato que se utilizara como criterio en sql. en el ej seria string >>>>>>//"s" strinf, "i" int, "d" decimal 
                      //- variable con criterio. va ser la variable donde tengaos almacenado el valor. 
                      //ej: donde tengamos almacenado argentina en el ej >>>>>>$pais=$_GET["buscar"];

//que quiere decir? tenemos la sentencia: $sql="SELECT * FROM PRODUCTOS WHERE PAIS DE ORIGEN=?". ? el parametro puede venir de otra pag o como resultado del valor de un usuario ingresado en la pagina 
//ej argentina
//el tercer paso tiene que unir argentina con la sentencia. donde va ? introducir argentina 

//las variables van en el orden del insert into y ojo con el tipo de dato. que tambien va en ese orden .
$ok=mysqli_stmt_bind_param($resultado1, "sssssss",$c_art, $secc, $n_art, $pre, $fec, $imp, $p_orig); //ok devuelve true o false 

//paso 4
// ejecutar sql. ejecutar la consulta con la funcion: mysqli_stmt_execute(). devuelve true(si se ejecuta correctamente ) o false (si hay error)
//necesita como parametro: el objeto mysqli_stmt
$ok=mysqli_stmt_execute($resultado1);

if ($ok==false){
    echo"error al ejecutar la consulta";
}else{
    //paso 5
    //asociar variables al resultado de la consulta. esto lo conseguimos con la funcion: mysqli_stmt_bind_result(). devuelve true(si se ejecuta correctamente ) o false (si hay error)
 //necesita como parametro: el objeto mysqli_stmt y tantas variables como columnas en la consulta sql
// $ok=mysqli_stmt_bind_result($resultado1, $codart, $secc, $precio, $paisor );

 //paso 6
 //lectura de valores. para ello usamos la funcion: mysqli_stmt_fetch
 //pide como parametro el objeto mysqli_stmt 

 echo "Nuevo registro agregado a la base de datos! <br><br>";
//  (mysqli_stmt_fetch($resultado1)){
//     echo $codart . " ". $secc . " ". $precio. " ".$paisor . " <br>";
//  }
 //cerrar el objeto mysqli_stmt que nos devolvio preparee
 mysqli_stmt_close($resultado1);
}


//todo esto evita la inyeccion!
?>
</body>
</html>