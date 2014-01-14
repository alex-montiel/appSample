<?php

include 'Vues/V_menupersonne.php';
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'accueil';
}
$action=$_REQUEST["action"];
switch ($action) {
    case "consulterpersonne":
        $numDivision = $_POST['choixdiv'];
        $colPers = pdoPersonne::LoadPersonneDivision($numDivision);
        include "Vues/V_personneconsulter.php";
        break;
    
    case "consulterpersonnedivision":
        include "Vues/V_choisir_div_personne.php";
        break;
    
    case "ajouterpersonne":
        $colDivision = PdoDivision::loadDivision();
        include "Vues/V_personneajouter.php";
        break;
    
    case "validajoutpersonne":
        $numPersonne = $_POST['num'];
        $strNom = $_POST['nom'];
        $strPrenom = $_POST['prenom'];
        $dteDateNaiss = new DateTime($_POST['dateNaissance']);
        $dteDateNaiss = $dteDateNaiss->format("Y-m-d");
        $numDiv = $_POST['choixdiv'];
        $objDiv = PdoDivision::loadOneDivision($numDiv);
        //$numPersonne = pdoPersonne::RecupererDernierNum();
        
        $objPersonne = new Personne($numPersonne,$strNom,$strPrenom,$dteDateNaiss,$objDiv);
        
        pdoPersonne::SavePersonne($objPersonne);
        
        ajouterMessage('Personne sauvegard&eacute;e');
        include("Vues/V_info.php");
        
        break;
    
    case "supprimerpersonne":
        
        $numPersonne = $_REQUEST['id'];
        $objPersonne = pdoPersonne::LoadOnePersonne($numPersonne);
        pdoPersonne::DeletePersonne($objPersonne);
        $colPers = pdoPersonne::LoadAllPersonne();
        include "Vues/V_personneconsulter.php";
        
        break;
    
    case "modifierpersonne":
        $colDivision = PdoDivision::loadDivision();
        $numPersonne = $_REQUEST['id'];
        $objPersonne = pdoPersonne::LoadOnePersonne($numPersonne);
        include "Vues/V_personnemodifier.php";
        
        break;
    
    case "validmodifpersonne":
        $numPersonne = $_REQUEST['id'];
        $nomPersonne = $_POST['nom'];
        $prenomPersonne = $_POST['prenom'];
        $dateNaissance = $_POST['dateNaissance'];
        $numDiv = $_POST['choixdiv'];
        $objDiv = PdoDivision::loadOneDivision($numDiv);
        $objPersonne = new Personne($numPersonne, $nomPersonne, $prenomPersonne, $dateNaissance, $objDiv);
        pdoPersonne::SavePersonne($objPersonne);
        
        ajouterMessage('Personne modifi&eacute;e');
        include("Vues/V_info.php");
        
        break;
        
    default:
        include 'Vues/V_accueil.php';
    break;
        
}
