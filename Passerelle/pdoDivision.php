<?php

require_once 'Passerelle/pdoConnexion.php';
require_once 'Utils/Collection.php';
/** 
 * Classe d'acc�s aux donn�es PdoDivision. 
 * @author 
 * @version    1.0
 */

class PdoDivision{   	

/*
 * fonction charg� de verifier si un enregistrement existe d�ja dans la base.
 * @param: strcode: chaine correspondant � la cl� primaire
 * @return: true/false
 */
	public static function boolExiste($strcode){
		$objPdo = PdoConnexion::getPdoConnexion();
		$strReq="select count(*) as nblignes from division Where codeDivision=$strcode";
		$objRes = $objPdo->query($strReq);
		if ($objRes->fetchColumn() > 0){
			$objRes->closeCursor();
			return true;
		}
		else{
			return false;
		}
	}
/*
 * fonction qui charge tous les enregistrements
 * @return objCol: Retourne un tableau associatif (methode getAll de la classe Collection)
 * que l'on peut manipuler avec un foreach
 */
	public static function loadDivision(){
		$objPdo = PdoConnexion::getPdoConnexion();
		$objCol = new Collection();
		$strReq = "select codeDivision as codeDiv, libelle as lib from division";
		$objRes = $objPdo->query($strReq);		
		$objLignes = $objRes->fetchAll();
		foreach ($objLignes as $arrayDivision){
			$strCode = $arrayDivision['codeDiv'];
			$strLib = $arrayDivision['lib'];
			$objDivision = new Division($strCode,$strLib);
			$objCol->add($objDivision);  
		}
		$objRes->closeCursor();
		return $objCol->getAll(); 
	}

/*
 * fonction qui charge un enregistrement � partir de la cl� primaire
 * @param: strcode: chaine correspondant � la cl� primaire
 * @return: objDivision Retourne une instance de la classe Division
 */
	public static function loadOneDivision($strcode){
		$objPdo = PdoConnexion::getPdoConnexion();
		$strReq="SELECT * FROM division
				WHERE codeDivision = $strcode";
		$objRes = $objPdo->query($strReq);
		$ligne = $objRes->fetch();
		$objDivision=new Division($ligne["codeDivision"],$ligne["libelle"]);
		$objRes->closeCursor(); 
		return $objDivision;
	}
        
	/*
	 * fonction qui sauvegarde une instance de division dans la base
	 * Se charge de verifier s'il faut faire un INSERT ou un UPDATE
	 * @param: objDivision: objet de la classe Division
	 */
	public static function saveDivision($objDivision){
		$objPdo = PdoConnexion::getPdoConnexion();
		$c=$objDivision->getCode();
		$l=$objDivision->getLibelle();	
		if (PdoDivision::boolExiste($c)){
			$strReq="UPDATE division 
					SET libelle='$l'
					WHERE codeDivision=$c";	
		}
		else{	
			$strReq="INSERT INTO division VALUES ($c,'$l')";			
		}
		$objPdo->exec($strReq);
	}
//        public static function modifLibDiv($objDivision){
//                $objPdo = PdoConnexion::getPdoConnexion();
//                
//                $codeDiv = $objDivision->getCode();
//                $libDiv = $objDivision->getLibelle();
//                
//                if(PdoDivision::boolExiste($codeDiv)){
//                    $req = $objPdo->prepare('update division set libelle = ? where codeDivision = ?');
//                    $req->bindParam(1, $codeDiv);
//                    $req->bindParam(2, $libDiv);
//                    $req->execute();
//                }
//                else
//                {
//                    echo "La division suivante n'existe pas : " + $objDivision->toString();
//                }
//        }
		
}
?>
