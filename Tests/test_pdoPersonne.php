<?php

require_once 'Passerelle/pdoPersonne.php';

//Chargement des Personnes stockées dans la table personne
$colPers = pdoPersonne::LoadAllPersonne();

//Affichage de la liste des personnes

echo '<h3>Liste de toutes les Personnes</h3>';

foreach($colPers as $objPersonne)
{
    echo $objPersonne->toString().'<br />';
}

//Chargement des personnes de la division 801 et affichage des résultats
$colPersDiv = pdoPersonne::LoadPersonneDivision('801');
echo '<h3>Liste de toutes les personnes de la division 801</h3>';

foreach($colPersDiv as $objPersonneDiv)
{
    echo $objPersonneDiv->toString().'<br />';
}

//retourne la personne numéro 3
echo '<h3>Personne numéro 3</h3>';

$objPersonne = pdoPersonne::LoadOnePersonne(3);
echo $objPersonne->toString()."<br />";

//Sauvegarde d'une personne dans la base si elle n'existe pas, sinon, elle est mise à jour

$objDivision = PdoDivision::loadOneDivision('901');
$dteDateNaiss = new DateTime('1994-11-08');
$objPersonne = new Personne(4, 'MONTIEL', 'Alexandre', $dteDateNaiss, $objDivision);
if(pdoPersonne::BoolExistePersonne($objPersonne->getNum()))
{
    echo '<h3>Une personne a été mise à jour en 901</h3>';
}
else
{
    echo '<h3>Une personne a été crée en 901</h3>';
}

pdoPersonne::SavePersonne($objPersonne);

//Rechargement de la liste des personnes pour afficher les modifications
$colPers = pdoPersonne::LoadAllPersonne();
echo '<h3>Liste mise à jour de toutes les personnes </h3>';

foreach($colPers as $objPersonne)
{
    echo $objPersonne->toString().'<br />';
}
//Test de la méthode DeletePersonne
echo '<h3>Suppression de la personne 4</h3>';

$objPersonne = pdoPersonne::LoadOnePersonne(4);

if (pdoPersonne::BoolExistePersonne(4)){
    pdoPersonne::DeletePersonne($objPersonne);
    echo "La personne a bien été supprimé";
}else{
    echo "La personne n'existe pas";
}

$colPers = pdoPersonne::LoadAllPersonne();
echo '<h3>Liste mise à jour de toutes les personnes </h3>';

foreach($colPers as $objPersonne)
{
    echo $objPersonne->toString().'<br />';
}