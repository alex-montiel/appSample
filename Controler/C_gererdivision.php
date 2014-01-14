<?php
include 'Vues/V_menudivision.php';

if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'accueil';
}
$action=$_REQUEST["action"];
switch ($action) {
	case "division_consult":

		$colDivisions = PdoDivision::loadDivision();
		include 'Vues/V_division_consult.php';
                break;
	case "division_ajout":
		include 'Vues/V_division_ajout.php';
		break;
	case "valid_ajout_division":
		$strlecode = $_REQUEST['code'];
		$strlelibelle = $_REQUEST['libelle'];
		valideInfosDivision($strlecode, $strlelibelle);
		if (nbErreurs() != 0 ){
			include("Vues/V_erreurs.php");
		}
		else{	
			
			$objDivision = new Division($strlecode, $strlelibelle);
			PdoDivision::saveDivision($objDivision);
			ajouterMessage('Division sauvegard&eacute;e');
			include("Vues/V_info.php");
			
		}			
		break;
	default:
		include 'Vues/V_accueil.php';
	break;
}