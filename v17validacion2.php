<?php
if (isset($_POST["enviando"])){

	$nombre=$_POST["nombre_usuario"];
	$edad=$_POST["edad_usuario"];
    switch (true):
        case $edad<=18:
            echo "eres menor de edad";
            break;
        case $edad<=40:
        echo "eres joven";
        break;
        case $edad<=65:
        echo "eres veiji";
        break;
        default:
        echo "cuidate";
        endswitch;
       

}

?>