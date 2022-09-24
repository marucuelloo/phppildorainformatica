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
    $var1=5;

    ////////////while
    /*
    while($var1<7){
        echo "estamos ejecutando el codigo del bucle <br>";
        //guarda con los bucles infinitos, si yo no coloco que incrementa en 1, la condicion se va cumplir siempre xq siemore va ser 5 
        $var1++;
    }
    echo "Hemos salido del bucle ";*/


    ///////////////////do while 
    //es similar, la diferencia esta en que el dowhile ejecuta el interior del bucle aunque la condicion sea falsa
    //entonces aunq sea 1 vez va ejecutar lo de adentro del do, y va incrementar la var en 1 
    do{
        echo "estamos ejecutando el codigo del bucle <br>";
        $var1++;

    }while($var1<3);
    echo "Hemos salido del bucle ";


    ?>

</body>
</html>