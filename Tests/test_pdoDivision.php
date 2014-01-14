
<?php

require_once 'Passerelle/pdoDivision.php';
// chargement des divisions stockées dans la table Division dans un objet Collection
$colDivision = PdoDivision::loadDivision();

// Afichage des objets Divisions (code et libellé) de la collection $colDivision
echo '<h2>Liste des divisions</h2>';
foreach ($colDivision as $division) 
{
    echo $division->getCode() . ' '.$division->getLibelle().'<br />';
}

// Création d'un objet Division 902, CGO 

$objDiv = new Division(902,'CGO');

// test de l'existance de la division dans la table Division et affiche le message correspondant
if(PdoDivision::boolExiste($objDiv->getCode()))
{
    echo '<h2>la division '.$objDiv->getCode().' existe deja, elle sera mise à jour</h2>';
    echo 'Récap : '.$objDiv->getCode().' '.$objDiv->getLibelle().'<br />';
}
else
{
    echo '<h2>la division '.$objDiv->getCode().' sera créée</h2>';
    echo 'Récap : '.$objDiv->getCode().' '.$objDiv->getLibelle().'<br />';
}

// sauvegarde la Division dans la base (ajout ou modif selon le message affiché précédemment ) 
PdoDivision::saveDivision($objDiv);

$objDiv = new Division(902, 'CGO 2');
// test à nouveau l'existance de la division dans la table Division 
// et affiche le message correspondant

if(PdoDivision::boolExiste($objDiv->getCode()))
{
    echo '<h2>la division '.$objDiv->getCode().' existe deja, elle sera mise a jour</h2>';
    echo 'Récap : '.$objDiv->getCode().' '.$objDiv->getLibelle().'<br />';
}
else 
{
    echo '<h2>la division '.$objDiv->getCode().' sera creee</h2>';
    echo 'Récap : '.$objDiv->getCode().' '.$objDiv->getLibelle().'<br />';
}
PdoDivision::saveDivision($objDiv);

    echo '<h2>Nouvelle liste des divisions</h2>';

$colDivision = PdoDivision::loadDivision();

foreach($colDivision as $division)
{
    echo $division->getCode().' '.$division->getLibelle().'<br />';
}

$numDivision = '901';
$div = PdoDivision::loadOneDivision($numDivision);
echo '<h2>la division : '.$numDivision.'</h2>';
echo $div->toString();

?>


