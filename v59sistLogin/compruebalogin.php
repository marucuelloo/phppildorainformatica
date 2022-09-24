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
    //libreria pdo
    //uso try catch para decirle que debe hacer si no tiene exito la conexion 
    try{
        //conexion
        $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //creo instrucion sql que se encarga de mirar en la bd si el usuario existe o no
        $sql="SELECT * FROM USUARIOSPASS WHERE USUARIOS= :login AND CONTRA= :contra";
        //creo una consulta preparada con marcadores
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
        // nosotros en los ejemplos anterior mostrabamos lo q habia dentro de la base de datos
        //en este caso nno tenemos que imprimir nada 
        //necesitamos saber si el usuario esta dentro o no de la bd:para esto usamos la funcion: rowCount() nos dice el numero de registros que devuelve una consulta
        //en el caso de que no exista el usuario la funcion va devolver 0 filas
        //en el caso de q si exista la comsulta devuelve 1
        //creo una variable que es igual a $resultado llamando la funcion rowCount()
        $numeroregistro=$resultado->rowCount();
        //si el usuario si existe
        if($numeroregistro!=0){
            //prox video aca dirige a la pagina de usuarios registrados
            //echo "<h2>Funcionó!</h2>";

            //antes de dirigir a la pagina, iniciamos sesion:
            session_start();
            //Ahora tenemos que almacenar en la variable superglobal $_SESSION, el login del usuario
            //[el nombre que le queremos dar a la variable superglobal]= a de donde vienen los datos 
            $_SESSION["usuario"]=$_POST["login"];



            header("location:usuariosregistrados1.php");
            //sin embargo, esto es poco seguro, ya que si otro usuario copia la url podria entrar sin el acceso de usuario y contra
            //esto se soluciona con las sesiones 
            //cuando el usuario tenga exito en su login, es decir se encuentre en la bd, crear una sesion para ese usuario
            //impresindible que esa sesion este abierta para poder acceder a esa pagina 
            //y si queremos acceder a la sesion copiando url no se pueda. queremos acceder sin pasar x el login no se pueda:
            //funcion session_star(): Iniciar una nueva sesion o reanudar la existente 
            //hay 2 formas de crear o reanudar una sesion: a-usando los datos que le pasamos usando $_GET o $_POST b-cookie
            //variable superglobal $_SESSION 


             

        }else{
            //si no existe, meter en un bucle infinito, no dejar salir de la pag de login 
            //con funcion header de php 
            header("location:login.php");

        }

    }catch (Exception $e){
        //die que mate cualqueir proceso 
        die("Error: " . $e->getMessage());
    }



?>
    
</body>
</html>