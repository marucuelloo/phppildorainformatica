<?php
//este video no se puede probar, ya que el lo realiza con su hosting, desde local hay q ver videos para config el xamp 
//para los campos requeridos obligatoriamente:
if($_POST["nombre"]==""|| $_POST["apellido"]==""|| $_POST["email"]=="" || $_POST["comentarios"]==""){
    echo "hubo un error, revisa los campos"; 
    die(); //esta funcion es para que si llega a este punto no continue ejecutando el codigo a continuacion 
    //el programa muere en esta linea de codigo
}




//creo una serie de variables y les paso por metodo post el nombre que tienen en el formulario 
$textomail=$_POST["comentarios"];
$destinatario=$_POST["email"];
$asunto=$_POST["asunto"];

//una serie de convenciones que se usan a la hs de intercabiar archivos por correo 
$headers="MIME-Version: 1.0/r/n";

//.= sirve para concatenar 
//ejemplo nombre.=apellido estoy almacenando lo q ya hay en su interior osea nombre mas el apellido
//codificacion de caracteres 
$header.="Content-type: text/html; charset=iso-8859-1/r/n";
//de quien viene el mensaje 
$header.="From: Prueba Maru <marucuelloo@gmail.com /r/n>";

$exito=mail($destinatario, $asunto, $textomail, $header);

if($exito){
    echo "MENSAJE ENVIADO";

}else{
    echo "ha habido un error";
}
?>
