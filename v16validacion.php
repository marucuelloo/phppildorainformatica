<?php
//cuando necesitas evaluar mas de una condicion, se usan los operadores logicos

//ejercicio nombre y contraseña son correctos

if(isset($_POST["enviando"])){
    $contra=$_POST["contra_usuario"];
    $nombre=$_POST["nombre_usuario"];
    $resultado=$nombre=="Maru"&&$contra=="1234" ? "Puedes acceder": "No puedes acceder";
    echo $resultado;
}
?>