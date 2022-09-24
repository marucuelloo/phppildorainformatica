<?php

//permita el acceso a maru cele y gas. 3 condiciones
// switch(condicion a evaluar){
//     case valor 1:
//     codigo;
//     break;
//     case valor 2:
//     codigo;
//     break;
//     case valor 3:
//     codigo;
//     break;
//     default:
//     }



if (isset($_POST["enviando"])){

	$nombre=$_POST["nombre_usuario"];
    $contra=$_POST["contra_usuario"];
	$edad=$_POST["edad_usuario"];

	$edad1=$edad>=18;

$valido1=$nombre=="Maru" && $contra=="1234" && $edad1;
$valido2=$nombre=="Cele" && $contra=="4321" && $edad1;
$valido3=$nombre=="Gas" && $contra=="1111" && $edad1;

	switch (true) {

		case $valido1;

			echo "usuario autorizado, Hola $nombre";

			break;

		case $valido2;
		
			echo "Usuario autorizado, Hola $nombre";

			break;	

		case $valido3;
		
			echo "Usuario autorizado, Hola $nombre";

			break;

		default:
		
			echo "Usuario no autorizado";

	}

}



?>
