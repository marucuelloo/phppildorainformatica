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

include("v25vehiculosherencia.php");

$ferrari= new Coche();
$volvo=new Camion();

// video 26 luego de instanciar, inicialice con 4 ruedas el auto, pero puedo decilr que tenga 7 de momento
//esto no deberia ocurrir, entonces private en ruedas en donde cree las clases
//$ferrari->ruedas=7; //esto me da error xq puse private a  la propiedad ruedas
//me va dar error, luego de poner private, entonces debo usar funciones getter y setters
//en este caso el metodo getter xq solo quiero ver las propiedades. la cant de ruedas

//echo "Ferrari tiene " . $ferrari->ruedas . " ruedas <br>";
//echo "Volvo tiene " . $volvo->ruedas . " ruedas <br>";

echo "Ferrari tiene " . $ferrari->get_ruedas() . " ruedas <br>";
//cuando quiero ver las ruedas del camion no me deja llamar a ruedas pero si al metodo get_ruedas()para visualizar el numero de ruedas
echo "Volvo tiene " . $volvo->get_ruedas() . " ruedas <br>";
//si quiero ver las ruedas de camion, si bien el metodo si lo hereda, 
//hereda con una ruedad de coche que es privada no ve las ruedad=8 del camion
//entonces debo cambiar la propiedad rueda private por protected
echo "Ferrari tiene un motor de " . $ferrari->get_motor() . " cc <br>";
$ferrari->girar();
//volvo tambien hereda los metodos de coche
$volvo->arrancar();

////////////////////////////////////////
echo"__________________________________________________________ camion hereda el metodo de coche y puedo asignar color:<br>";
$volvo->establece_color("azul", "Volvo");


?>
</body>
</html>