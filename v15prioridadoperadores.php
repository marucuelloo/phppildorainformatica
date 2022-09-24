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
    $var1=true;
    $var2=false;
    $resultado=$var1&&$var2; //resultado=false 

    //&& obliga a que se cumplan todas las condiciones que evaluamos
    if($resultado==true){
        echo "correcto";
    }else{
        echo "incorrecto";
    }
    //sin embargo si cambiamos && por and el resultado es distinto y esta dado por el orden de prioridad 
    //    $resultado=$var1and$var2; //resultado=true  ya que resuelve resultado=var1 yyyyyy luego lee el false 

    ?>
</body>
</html>