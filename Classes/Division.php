<?php
	class Division{
		/*
		Déclaration des attributs de la classe
		php est faiblement typé donc pas de déclaration de type (ce qui pose souvent de nombreux problèmes par la suite).
		*/
		private $_strcode; 		//string
		private $_strlibelle;	//String

/*
Constructeur de la classe
on ne peut créer qu'un seul constructeur en php
la surcharge n'existant pas en PHP (contrairement au langage Java ou C#)
*/
		
		public function __construct($strlecode, $strlelibelle) {
/*
Pour accèder à un attribut ou à une méthode de la classe, on utilise l'instance en cours, c'est à dire $this. 
Le séparateur instance / Méthode ou propriété n'est pas le point mais une fl�che vers la droite gràce aux caractères tiret ( -) et superieur ( > ) ->
*/
			
			$this->_strcode = $strlecode;
			$this->_strlibelle = $strlelibelle;
		}

//méthodes getteurs ou assesseurs
		public function getCode(){
			return $this->_strcode;
		}

		public function getLibelle(){
			return $this->_strlibelle;
		}
//méthodes setteurs ou mutateurs (Les paramètres n'ont pas de type ce qui peut poser des problèmes)
		public function setCode($lecode){
			$this->_strcode = $lecode;
		}
		
		public function setLibelle($lelibelle){
			$this->_strlibelle = $lelibelle;
		}
/*
 * autre méthodes pour les tests
*/
		public function toString(){
			$ch = $this->_strcode." ".$this->_strlibelle;
			return $ch;
		}
	}
?>