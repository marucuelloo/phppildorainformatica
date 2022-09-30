<?php
class Objetoblog{
    //PROPIEDADES DEL OBJETO BLOG
    //debemos construir los atributos o prop del obj blog: titulo comentario imagen y 2 no visibles que son el id y la fecha

    private $id;
    private $titulo;
    private $fecha;
    private $comentario;
    private $imagen;
    //METODOS DE ACCESO 
//ahora necesitamos los metodos de acceso: los getter y setter

//setter estabelcer los valores de estas propiedades
//getter mostrar los valores de estas propiedades 

public function getid(){
    return $this->id;
}
//pasar un parametro/argumento que puede tener el mismo u otro nombre diferente a la variable 
public function setid($id){
   $this->id=$id;
   //$this->id hace alusion a la variaable $id y el $id de la formula hace alusion al parametro que le estoy pasadno y lo podria llamar como quiera
}


public function gettitulo(){
    return $this->titulo;}

public function settitulo($titulo){
    $this->titulo=$titulo;  
}

public function getfecha(){
    return $this->fecha;}

public function setfecha($fecha){
    $this->fecha=$fecha;
}

public function getcomentario(){
    return $this->comentario;}

public function setcomentario($comentario){
    $this->comentario=$comentario;
    
}

public function getimagen(){
    return $this->imagen;}

public function setimagen($imagen){
    $this->imagen=$imagen;
    
}


}








?>
