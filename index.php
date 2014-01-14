<?php
require_once 'Utils/Collection.php';
include 'Utils/fnUtil.php';
require_once 'Classes/Division.php';
require_once 'Classes/Personne.php';
require_once 'Passerelle/pdoConnexion.php';
require_once 'Passerelle/pdoDivision.php';
require_once 'Passerelle/pdoPersonne.php';

include 'Vues/V_entete.php';


if(!isset($_REQUEST['uc'])){
	$_REQUEST['uc'] = 'accueil';
}
$uc=$_REQUEST["uc"];
switch ($uc) {
	case "gererpersonne":
		include 'Controler/C_gererpersonne.php';
	
	break;
	case "gererdivision":
		include 'Controler/C_gererdivision.php';
	
	break;
	default:
		include 'Vues/V_menu.php';
		include 'Vues/V_accueil.php';
	break;
}
include 'Vues/V_pied.php';
