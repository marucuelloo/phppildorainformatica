<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<?php

	include("v28concecionariostatic.php");
	//como el campo estatico ayuda no es privado puedo modificar el precio de la ayuda
	//para eso llama a la clase creada::campoestatico
	//la solucion es encapsular y hacer privada la var estatic
	//Compra_vehiculo::$ayuda=10000;  //esto ahora nos da error, xq ya esta declarada como privado el campo static ayuda
	
	//metodo static pertence a la clase asi q cuando quiero llamarlo
	//consigo que se ejecute

	Compra_vehiculo::descuento_gobierno();

	$compra_Antonio=new Compra_vehiculo("compacto");
	
	$compra_Antonio->climatizador();
	
	$compra_Antonio->tapiceria_cuero("blanco");
	
	echo $compra_Antonio->precio_final() . "<br>";
	
	$compra_Ana=new Compra_vehiculo("compacto");
	
	$compra_Ana->climatizador();
	
	$compra_Ana->tapiceria_cuero("rojo");
	
	echo $compra_Ana->precio_final() . "<br>";
	
	
	
	


?>
</body>
</html>