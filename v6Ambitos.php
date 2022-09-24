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
$nombre="juan";

// include("v6Datosotros.php");
// dameNombre();
// echo $nombre;
//al ejecutar el codigo si bien estamos llamando una funcion que tiene una variabela nombre que dice maria
//va ejecutarse juan, esto sucede para cuando copiamos o llamamos un codigo externo no se sobrescriban las variables. 
//en el caso q quiera que si quiero que se sobrescriba la variaeble, es decir que se vea maria y no juanÑ
function dameNombre(){
    //convierto la variable a global para que la pueda llamar desde la funcion y definir global si o si dentro de la funcion
    global $nombre;
    $nombre="El nombre es " . $nombre;

}
dameNombre();
echo $nombre;


    ?>
</body>
</html>