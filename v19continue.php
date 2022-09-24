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
      for($i=10;$i>=-10;$i--){

        //cuando haga 9/0 va dar error, entonces agregamos un if y continue
        if($i==0){
            echo "Division por cero no es posible <br>";
            continue;
        }
        echo "9x $i= " . 9*$i . "<br>";
      }
      echo "Hemos salido del bucle";

      //9x0=0
      //9x1=9
      //... 
      //hasta 9x10=90
      //9x11 hemos salido del bucle


?>
</body>
</html>