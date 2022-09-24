<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1, h2{
            text-align: center;
        }
        table{
            width:25%;
            background-color:#FFC;
            border: 2px dotted #F00;
            margin: auto;
        }
        .izq{
            text-align: right;
        }
        .der{
            text-align: left;
        }
        td{
            text-align:center;
            padding:10px;
            
        }

    </style>
</head>
<body>

<!-- 2 esta pagina tiene que se capaz de comprobar si usuario y contra existen en el formulario  -->
<!-- copiamos todo lo de comprueba conexion   -->
<!-- agregamos un if usando la funcion isset para que todo esto se ejecute una vez que el usuario haya presionado enviar, sino no voy a tener que almacenar en las variables $login y $contra -->

<?php
if(isset($_POST["enviar"])){
    //libreria pdo
    //uso try catch para decirle que debe hacer si no tiene exito la conexion 
    try{
        //conexion
        $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        $sql="SELECT * FROM USUARIOSPASS WHERE USUARIOS= :login AND CONTRA= :contra";
       
        $resultado=$base->prepare($sql);
        //ahora tengo q rescatar el usuario y e login que el usuario introdujo en la otra pagina  $_POST[]
        //hrmlentities convierte cualquier simbolo en html, addslashes escapar cualquier simbolo extraño 
        $login=htmlentities(addslashes($_POST["login"]));
        $contra=htmlentities(addslashes($_POST["contra"]));
        //ahora tenemos que decir al marcador es lo mismo que $login y $contra que son lo introducido x el usuario 
        //binValue se usa en marcadores y bindParam cuando usamos parametros 
        $resultado->bindValue(":login", $login);
        $resultado->bindValue(":contra", $contra);
        //ejecutamos la instruccion sql:
        $resultado->execute();
        //necesitamos saber si el usuario esta dentro o no de la bd:para esto usamos la funcion: rowCount() nos dice el numero de registros que devuelve una consulta
        //en el caso de que no exista el usuario la funcion va devolver 0 filas
        //en el caso de q si exista la comsulta devuelve 1
        //creo una variable que es igual a $resultado llamando la funcion rowCount()
        $numeroregistro=$resultado->rowCount();
        //si el usuario si existe
        if($numeroregistro!=0){
            // aca dirige a la pagina de usuarios registrados
            //antes de dirigir a la pagina, iniciamos sesion:
            session_start();
            //Ahora tenemos que almacenar en la variable superglobal $_SESSION, el login del usuario
            //[el nombre que le queremos dar a la variable superglobal]= a de donde vienen los datos 
            $_SESSION["usuario"]=$_POST["login"];
            //header("location:usuariosregistrados1.php"); //ahora no quiero q me diriga a otra pagina 

        }else{
            //si no existe, meter en un bucle infinito, no dejar salir de la pag de login 
            //con funcion header de php 
           // header("location:login.php");  //ahora no quiero q me diriga al login de nuevo
           echo "Error. usuario o contraseña incorrectos ";

        }

    }catch (Exception $e){
        //die que mate cualqueir proceso 
        die("Error: " . $e->getMessage());
    }

}

?>
<?php 
//3 Ahora quiero que cuando reconzca usuario y contra todo el login desaparezna
//lo hago usando include 
//al separar el formulario de login en otra pagina, me permite decirle cuando quiero que se incluya y cuando no el formulario usando include
//solamente se cargue si no hemos iniciado sesion
if(!isset($_SESSION["usuario"])){

    include("formulario.html");
}else{
    echo "Usuario: " . $_SESSION["usuario"];
}

?>

<h2>CONTENIDO DE LA WEB</h2>
                <table width="800" border="o">
                <tr>
                <td><img src="img\jonas1.jpg" width="300" height="400" /></td>
                <td><img src="img\jonas2.jpg" width="300" height="400"  /></td>
                </tr>
                <tr>
                 <td><img src="img\jonas3.jpg"width="300" height="400"  /></td>
                <td><img src="img\jonas4.jpg" width="300" height="400"  /></td>
                </tr></table>

<!-- ahora le decimos que cuandp cargue usuario y contra vuelva a cargar la misma pagina -->
<!--si existe, el login debe desaparecer  -->
</body>
</html>