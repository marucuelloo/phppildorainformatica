<?php
class conectar{
    public static function conexion(){
        try{
            //aca especifico lo de los caracteres de otra manera direcatmente en la instancia del PDO, en los comentarios explican q es la manera correcta hoy en dia 
            $conexion=new PDO('mysql:host=localhost; dbname=pruebas', 'root', "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");
        }catch(exception $e){ //si no lo consigues,mate el proceso y msj de error:
            die ('error: ' . $e->GetMessage());
            echo "Linea del error: " . $e->getLine();
    }
  return $conexion; 
}
}

?>