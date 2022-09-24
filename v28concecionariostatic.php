<?php

	class Compra_vehiculo{
		
		private $precio_base;
		
		//campo static es cero y luego creamos el metodo con el valor del descuento 
		static private $ayuda=0;
		
				
		function __construct($gama){
			//dependienod de la gama tiene distinto precio
			
			if($gama=="urbano"){
				
					$this->precio_base=10000;
				
			}else if($gama=="compacto"){
				
				
					$this->precio_base=20000;	
				
			}
			
			else if($gama=="berlina"){
				
					$this->precio_base=30000;	
				
			}		
			
			
		}// fin constructor
		
//creamos un metodo estatico, es compartido por los objetos pero pertence a la clase 
		static function descuento_gobierno(){
			//si quiero que el descuento el gob lo aplique de mayo a dic y de enero a mayo no aplique descuento:
			//if(date("m-d-y")>"05-01-22"){self::$ayuda=4500;}
			//si quiero que al dia de hoy no aplique sino que sea a partir de mañana 
			//la forma correcta segun los comentarios es y-m-d pero averiguar.
			if(date("y-m-d")>"22/09/11"){self::$ayuda=4500;}
			//mes/dia/año. la fecha sea superior al 01 de mayo del 2022
			//hacemos referencia a la var static dentro de la misma clase:
	
			
		}
		
		
		
		function climatizador(){		
			
			
				$this->precio_base+=2000;					
			
			
		}// fin climatizador
		
		
		function navegador_gps(){
			
			$this->precio_base+=2500;	
			
		}//fin navegador gps
		
		
		
		function tapiceria_cuero($color){
			
			if($color=="blanco"){
			
				$this->precio_base+=3000;
			}
			
			else if($color=="beige"){
				
				$this->precio_base+=3500;
				
			}
			
			else{
				
				$this->precio_base+=5000;
				
			}
			
		}// fin tapicería
		
		
		
		function precio_final(){
			//para hacer referencia al campo ayuda que es estatico
			//no se hace referencia a $this que hace referencia al objeto que estamos usando. y ayuda no pertence al objeto sino a la clase x es static
			//operadorf self::$ayuda para hacer referencia a un campo estatico
			$valor_final=$this->precio_base-self::$ayuda;
			//si no llamamos al metodo descuento la ayuda sera 0
			return $valor_final;	
			
		}// fin precio final
		
		
		
	}// fin clase


?>