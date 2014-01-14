<?php
class Collection{
	
	private $_colObjet;
	
	public function __construct(){
		$this->_colObjet=array();
	}
	
	public function add($obj){
		$this->_colObjet[]=$obj;
	}
	
	public function getAll(){
		return $this->_colObjet;
	}
}
?>