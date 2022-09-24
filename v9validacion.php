<style>
	h1{
		text-align:center;
	}

	table{
		background-color:#FFC;
		padding:5px;
		border:#666 5px solid;
	}
	
	.no_validado{
		font-size:18px;
		color:#F00;
		font-weight:bold;
	}
	
	.validado{
		font-size:18px;
		color:#0C3;
		font-weight:bold;
	}


</style>
<?php

//almacenar en una variable lo que hayamos puesto en el cuadro de texto nombre, el cuadro de texto edad
//tb que haga esto luego de presionar el boton enviar del formulario


//comprueba si hemos presionado el boton enviar del fomulario:
if(($_POST["enviando"])){
//introducimos el nombre del cuadro de texto de nombre 
//$_POST es una variable superglobal. son array

  $usuario=$_POST["nombre_usuario"];
  $edad=$_POST["edad_usuario"];

  if($usuario=="Maru" && $edad>=18){
    echo "<p class=\"validado\">puedes entrar</p>";
    }else {
      echo "<p class=\"no_validado\">no puedes entrar</p>";
    }

}

?>
