<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php</title>
</head>
<body>
<?php
//quiero reutilizar codigo

include("v24vehiculos.php");

$ferrari= new Coche();
$volvo=new Camion();

echo "Ferrari tiene " . $ferrari->ruedas . " ruedas <br>";
echo "Volvo tiene " . $volvo->ruedas . " ruedas <br>";


$ferrari->girar();
$volvo->arrancar();



?>
</body>
</html>