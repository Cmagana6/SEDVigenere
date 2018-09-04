<?php

class Vigenere {
    var $charset;
	var $text;
	var $llave;

     public function __construct($str, $key) {
        $this->charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";	//Definicion del charset
		$this->text    = strtoupper($str);
		$this->llave   = strtoupper($key);
    }

    function encode(){
		$result = "";						//Cadena donde queda el resultado
		$x = 0;								//Indice de la llave
		$p = 0;								//Posicion para relizar la operacion modular
		for($i=0; $i<strlen($this->text); $i++){
			if(strstr($this->charset, $this->text{$i})){//Evaluo si existe el caracter en el charset
				$x = strpos($this->charset, $this->llave{($p % strlen($this->llave))});
				$result .= $this->rotate($this->text{$i}, $x);	//Invoco funcion que hace la rotacion
				$p++; //Aumento el indice para la operacion modular
			}else{//Si no existe dejo el caracter evaluado
				$result .= $this->text{$i};
				continue;
			}
		}
        return $result;						//Devuelvo la cadena Cifrada =)
    }

 	/************************************************************************************
	* DesCifra la cadena pasada como parametro realizando una sustitucion
	* polialfabetica a traves de sumas modulares dependiendo el indice de cada caracter de la semilla
	* @param  $seed = Semilla con la que sera cifrado el mensaje
	* @return $result = Mensaje cifrado
	************************************************************************************/
    function decode(){
		$result = "";						//Cadena donde queda el resultado
		$x = 0;								//Indice de la llave
		$p = 0;								//Posicion para relizar la operacion modular
		for($i=0; $i<strlen($this->text); $i++){
			if(strstr($this->charset, $this->text{$i})){//Evaluo si existe el caracter en el charset
				$x = strpos($this->charset, $this->llave{($p % strlen($this->llave))});
				$result .= $this->rotate($this->text{$i}, -$x);	//Invoco funcion que hace la rotacion
				$p++; //Aumento el indice para la operacion modular
			}else{//Si no existe dejo el caracter evaluado
				$result .= $this->text{$i};
				continue;
			}
		}
        return $result;						//Devuelvo la cadena DesCifrada =)
    }

	/*****************************************************************************
	* Realiza la rotacion de un caracter sobre el charset dependiendo el valor de la llave
	* de la cadena original la cantidad de veces definida en el parametro
	* @param  $s = Cadena original
	*                 $n = Cantidad de rotaciones
	* @return  $result = Valor del nuevo caracter de acuerdo al indice
	*****************************************************************************/
	function rotate($c, $n){
        $result = "";			//Texto de salida
        $tamC = strlen($this->charset); //Longitud de la cadena del charset
		$k = 0; 				//Indice para sustitucion de la cadena con el charset
		$n %= $tamC;			//llave o rotacion
		$c = strtoupper($c);	//Convierto a mayuscula el caracter
		//Realizo la sustitucion de cada caracter
        //Evaluo si el caracter en la posicion $i existe, de lo contrario
        //Dejo el caracter que esta por defecto
		if(strstr($this->charset, $c)){
			$k = (strpos($this->charset, $c) + $n);
			if($k < 0){
				$k += $tamC;
			}else
				$k %= $tamC;
			$result .= $this->charset{$k};
		}else{
			$result .= $c;
		}
		return $result;
	}
}
?>
