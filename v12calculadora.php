
<style>
    .resultado{
        color:#F00;
        font-weight:bold;
        font-size:32px;

    }
</style>
<?php
    //enviar info al servidor cuando presione enviar
    //ver el nombre del boton enviar 
    //ver el identificador del numero1 y del 2:num1 y num2 
    //ver el identificador del desplegable :operacion


    //si el usuario presiono el boton, haceme...
    if(isset($_POST["button"])){
//almacenar en variables lo que introdcue en el cuadro de texto 1 y 2 y en el desplegable
        $num1=$_POST["num1"];
        $num2=$_POST["num2"];
        $operacion=$_POST["operacion"];
        calcular($operacion);
    }


    function calcular($calculo){
        //$operacion es una variable que esta por fuera de la funcion, 
        //entonces para que funcione, debo usar el paso de parametros

        //ahora le preguntamos que has selccionado?

        //dentro de los parentesis le digo que esta funcion tiene que requerir un valor cuando es llamada:$calculo
        //hay que pasarle ese parametro, ese valor, en la llamada: calcular($operacion);fila14
        //ademas declaro como globales las variables $num1 y $num2
        global $num1;
        global $num2;
        if(!strcmp("Suma", $calculo)){
            $resultado=$num1+$num2;

            echo "<p class='resultado'> el resultado es: $resultado</p> " ;
        }

        if(!strcmp("Resta", $calculo)){
            echo "<p class='resultado'>el resultado es: " . ($num1-$num2) . "</p>";
        }

        if(!strcmp("Multiplicacion", $calculo)){
            echo "<p class='resultado'>el resultado es: " . ($num1*$num2). "</p>";
        } 

        if(!strcmp("Division", $calculo)){
            echo "<p class='resultado'>el resultado es: " . ($num1/$num2). "</p>";
        }
        
        if(!strcmp("Incremento", $calculo)){
            $num1++;
            echo "<p class='resultado'>el resultado es: " . ($num1). "</p>";
        }

        if(!strcmp("Decremento", $calculo)){
            $num1--;
            echo "<p class='resultado'>el resultado es: " . ($num1). "</p>";
        }

    }


     ?>