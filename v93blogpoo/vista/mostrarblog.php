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
    include("..\modelo\manejoobj.php");
    try{
        $conexion=new PDO('mysql:host=localhost; dbname=blog', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $manejoobjeto= new Manejoobjetos($conexion);

        $tablablog=$manejoobjeto->getcontenidoporfecha();
        //si no hay entradas 
        if(empty($tablablog)){
            echo "No hay entradas de blog";

        }else{
            foreach($tablablog as $valor){
                echo "<h3>". $valor->gettitulo() . "</h3>";
                echo "<h4>". $valor->getfecha() . "</h4>";
                echo "<div style='width:400px'>";
                echo  $valor->getcomentario() . "</div>";
                if($valor->getimagen()!=""){
                    echo "<img src='../img/";
                    echo $valor->getimagen()."' width='300px' height='200px'/>";
                }
                echo "<hr/>";
            }
        }

    }catch(Exception $e){
        //die que mate cualqueir proceso 
        die("Error: " . $e->getMessage());
   echo "la linea del error es: " . $e->getLine();
}
?>

<br>
<a href="formulario.php"> Volver a la Página de insercion de comentario </a>



</body>
</html>