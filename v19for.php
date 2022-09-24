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
    //for
    // for(iniciacion bucle; condicion del bucle; incremento/decremento bucle){}
    for($i=0;$i<=10;$i++){
        //i=0 inicia aca
        //i=1
        //i=2
        //...
        //i=10

        //true 0,1,2,,,10 es menor o igual que 10
        //aumenta de 1 en 1 hasta i=10
        //11veces


        //...i=11
        //false.
        echo"<p> Hemos entrado en el bucle </p>";
        if($i==6){
            echo "<p> Bucle interrumpido</p>";
            break;

        }
    }

    //es lo mismo que 
    // for($i=10;$i>=0;$i--){
    //     echo"<p> Hemos entrado en el bucle </p>";
    // }

    //i=10 inicia aca 
   //true 10 es mayor que cero
    //decremente en 1

      //i=9
    //...
    //i=0

    //i=-1
    //false.

    //otra forma de hacer lo mismo
    //for($i=0; $i<=20; $i+=2)


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //sentencias interrupcion de bucle:

 //necesito que salga despues de haber sido ejecutado 7 veces..uso deel break...linea 28 a 33


    ?>
</body>
</html>