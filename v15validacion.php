<style> 
h1{
    text-align:center;
}
table{
    background-color:#FFC;
    padding: 5px;
    border: #666 5px solid;
}
.no_validado{
    font-size:18px;
    color:#F00;
    font-weight:bold;
        
    }
    .validado{
    font-size:18px;
    color:#0c3;
    font-weight:bold;
        
    }


</style>
<?php
//////////////////video15
// if(isset($_POST["enviando"])){
//     $edad=$_POST["edad_usuario"];
//     if($edad<=18){
//         echo "eres menor de edad";
//     }else if($edad<=40){
//         echo "eres joven";
//     }else if($edad<=65){
//         echo "eres maduro";
//     }else{
//         echo "cuidate";
//     }
// }

/////////////////video16
if(isset($_POST["enviando"])){
         $edad=$_POST["edad_usuario"];
         //ASI SERIA UN UN IF COMUN
    // if($edad<=18){
    //     echo "eres menor de edad. No tienes acceso";
    // }else{
    //     echo "eres mayor de edad. Tienes acceso";
    // }

    //OPERADOR TERNARIO
    //condicion? valor si verdadero: valor si falso
    echo $edad<18 ? "Eres menor de edad.No puedes acceder": "Puedes acceder.";

    //esto es lo mismo. alojando la informacion en la variable resultado
    $RESULTADO= $edad<18 ? "Eres menor de edad.No puedes acceder": "Puedes acceder.";
    echo $RESULTADO;
    }



?>