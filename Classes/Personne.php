<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Personne
 *
 * @author Alex
 */
class Personne {
    private $_strNumPersonne;
    private $_strNom;
    private $_strPrenom;
    private $_objDateNaissance;
    private $_objDivisionPersonne;

    //Constructeur de la classe
    public function __construct($strNumPersonne,$strNom,$strPrenom,$objDateNaissance,$objDivisionPersonne){
        $this->_strNumPersonne = $strNumPersonne;
        $this->_strNom = $strNom;
        $this->_strPrenom = $strPrenom;
        $this->_objDateNaissance = $objDateNaissance;
        $this->_objDivisionPersonne = $objDivisionPersonne;
    }
    
    //Méthodes assesseurs
    
    public function getNum(){
        return $this->_strNumPersonne;
    }
    public function getNom(){
        return $this->_strNom;
    }
    public function getPrenom(){
        return $this->_strPrenom;
    }
    public function getDateNaissance(){
        return $this->_objDateNaissance;
    }
    public function getDivision(){
        return $this->_objDivisionPersonne;
    }
    
    //Méthodes mutateurs
    
    public function setNum($strNumPersonne){
        $this->_strNumPersonne = $strNumPersonne;
    }
    public function setNom($strNom){
        $this->_strNom = $strNom;
    }
    public function setPrenom($strPrenom){
        $this->_strPrenom = $strPrenom;
    }
    public function setDateNaissance($objDateNaissance){
        $this->_objDateNaissance = $objDateNaissance;
    }
    public function setDivision($objDivisionPersonne){
        $this->_objDivisionPersonne = $objDivisionPersonne;
    }

    //Autres méthodes
    
    public function toString()
    {
        $chaine = $this->getNum()." ".
        $this->getNom()." ".
        $this->getPrenom()." ".
        $this->getDateNaissance()->format('d/m/Y')." (".
        $this->calculAge().") ".
        $this->getDivision()->toString();
        
        return $chaine;       
    }
    
    public function calculAge(){
        $today = new DateTime();
        $age = $this->_objDateNaissance->diff($today);
        return $age->y;
    }
}

?>
