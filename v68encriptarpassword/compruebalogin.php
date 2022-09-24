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


//voy a crear una variable contador para ver si el login introducido esta o no en la bd 
$contador=0;



        //conexion
        $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //creo instrucion sql que se encarga de mirar en la bd si el usuario existe o no
        $sql="SELECT * FROM USUARIOSPASS WHERE USUARIOS= :login";
        //creo una consulta preparada con marcadores
        $resultado=$base->prepare($sql);
        //ahora tengo q rescatar el usuario y e login que el usuario introdujo en la otra pagina  $_POST[]
        //hrmlentities convierte cualquier simbolo en html, addslashes escapar cualquier simbolo extraño 
        $login=htmlentities(addslashes($_POST["login"]));
        $contra=htmlentities(addslashes($_POST["contra"]));
        //ahora tenemos que decir al marcador es lo mismo que $login y $contra que son lo introducido x el usuario 
        //binValue se usa en marcadores y bindParam cuando usamos parametros 
        $resultado->bindValue(":login", $login);
    
        //ejecutamos la instruccion sql:
        $resultado->execute();



        while ($registro=$resultado->fetch(PDO::ERRMODE_EXCEPTION)){
         // echo "Usuario: " . $registro["USUARIOS"] . " Contraseña:" . $registro["CONTRA"] . "<br>";   

         //Paso x parametro la contra y la cifrada
         if(password_verify($contra, $registro["CONTRA"])){
            //esto devuelve true si son iguales, false si no lo son 
            //le digo si es true incrementa el contador
            $contador++;

         }    
         //quiere decir que encontro min a un usuario. ej puede ser 5 marias 
         if($contador>0)   {
            echo "Usuario registrado"; 
         }   else{
            echo "usuario no registrado";
         }

        }
        $resultado->closeCursor();

    }catch (Exception $e){
        //die que mate cualqueir proceso 
        die("Error: " . $e->getMessage());
    }



?>
    
</body>
</html>