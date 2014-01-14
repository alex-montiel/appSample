<?php

require_once 'pdoConnexion.php';
require_once 'Utils/Collection.php';
require_once 'pdoDivision.php';
require_once 'Classes/Personne.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pdoPersonne
 *
 * @author alexandre
 */
class pdoPersonne {
    
    //Verfie l'existence d'une personne grâce à son numéro et renvoie un résultat booléen
    public static function BoolExistePersonne($numPersonne){
        $objPdo = PdoConnexion::getPdoConnexion();
        $strReq = "select count(*) as nbpersonnes from personne where id = $numPersonne";
        $objRes = $objPdo->query($strReq);
        if ($objRes->fetchColumn() > 0){
            $objRes->closeCursor();
            return true;
        }
        else
        {
            return false;
        }
    }
    
    //Charge toutes les personnes enregistrées dans la base et retourne la collection remplie
    public static function LoadAllPersonne()
    {
        $objPdo = PdoConnexion::getPdoConnexion();
        $objCol = new Collection();
        $strReq = "select * from personne";
        $objRes = $objPdo->query($strReq);
        $objLignes = $objRes->fetchAll();
        foreach($objLignes as $lignePersonne)
        {
            
            $strCodeDivision = $lignePersonne['codeDivision'];
            $objDivision = PdoDivision::loadOneDivision($strCodeDivision);
            
            $strDateNaissance = $lignePersonne['date_naiss'];
            $dteDateNaissance = new DateTime($lignePersonne['date_naiss']);
            $strCode = $lignePersonne['id'];
            $strNom = $lignePersonne['nom'];
            $strPrenom = $lignePersonne['prenom'];
            $objPersonne = new Personne($strCode, $strNom, $strPrenom, $dteDateNaissance, $objDivision);
            $objCol->add($objPersonne);
        }
        $objRes->closeCursor();
        return $objCol->getAll();
    }
    
    /*Charge toutes les personnes d'une division passée en paramètre et les ajoute à la
    *fonction retournée
    */
    public static function LoadPersonneDivision($numDivision)
    {
        $objPdo = PdoConnexion::getPdoConnexion();
        $objCol = new Collection();        
        $strReq = "select * from personne where codeDivision = $numDivision";
        $objRes = $objPdo->query($strReq);
        $objLignes = $objRes->fetchAll();
        foreach ($objLignes as $ligne)
        {
            $dteDateNaiss = new DateTime($ligne['date_naiss']);
            $strCode = $ligne['id'];
            $strNom = $ligne['nom'];
            $strPrenom = $ligne['prenom'];
            
            $objDivision = PdoDivision::loadOneDivision($numDivision);
            
            $objPersonne = new Personne($strCode, $strNom, $strPrenom, $dteDateNaiss, $objDivision);
            $objCol->add($objPersonne);
        }
        $objRes->closeCursor();
        return $objCol->getAll();
    }
    
    //Retourne une personne dont le numéro est passé en paramètre
    public static function LoadOnePersonne($numPersonne)
    {
        $objPdo = PdoConnexion::getPdoConnexion();
        $strReq = "select * from personne where id = $numPersonne";
        $objRes = $objPdo->query($strReq);
        $objLigne = $objRes->fetch();
        
        $strDivision = $objLigne['codeDivision'];
        $strDateNaissance = new DateTime($objLigne['date_naiss']);
        $strCode = $objLigne['id'];
        $strNom = $objLigne['nom'];
        $strPrenom = $objLigne['prenom'];
        $objDivision = PdoDivision::loadOneDivision($strDivision);
        $objPersonne = new Personne($strCode,$strNom, $strPrenom, $strDateNaissance, $objDivision);
        
        $objRes->closeCursor();
        return $objPersonne;
    }
    //Enregistre une personne passée en paramètre dans la base
    public static function SavePersonne($objPersonne)
    {
        $objPdo = PdoConnexion::getPdoConnexion();
        $objDivision = $objPersonne->getDivision();
        $codeDivision = $objDivision->getCode();
        $intId = $objPersonne->getNum();
        $strNom = $objPersonne->getNom();
        $dteDate_naissance = $objPersonne->getDateNaissance();
        $strPrenom = $objPersonne->getPrenom();
        if(!pdoPersonne::BoolExistePersonne($intId))
        {
            $objReq = "insert into personne(id, nom, prenom, date_naiss,codeDivision)"
                    . "values($intId,"."'"."$strNom"."'".","."'"."$strPrenom"."'".","."'"."$dteDate_naissance"."'".","."'"."$codeDivision"."'".")";                
            
        }
        else
        {
            $objReq = "update personne "
                    . "set codeDivision="."'"."$codeDivision"."'".",nom="."'"."$strNom"."'".",prenom="."'"."$strPrenom"."'".",date_naiss="."'"."$dteDate_naissance"."'".""
                    . " where id=$intId";
                                            
            
        }
        $objPdo->exec($objReq);     
    }
    //Supprime la personne passée en paramètre de la base de données
    public static function DeletePersonne($objPersonne)
    {
        $objPdo = PdoConnexion::getPdoConnexion();
        $numPersonne = $objPersonne->getNum();
        $objReq = "delete from personne where id = $numPersonne";
        $objPdo->exec($objReq);
    }
    
    //Recupere le dernier numero de personne
    public static function RecupererDernierNum()
    {
        $objPdo = PdoConnexion::getPdoConnexion();
        $objReq = "SELECT MAX(id) AS 'nb' FROM personne";
        $objRes = $objPdo->query($objReq);
        
        $objLigne = $objRes->fetchColumn();
        $resultat = $objLigne['nb'];
        return $resultat;
    }
}
