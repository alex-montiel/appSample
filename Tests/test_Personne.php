<?php
    /*
     * Appel du constructeur de la classe Division pour créer l'instance $objDiv
     */
    $objDivision = new Division(801,'SIO1');
    $objDivisionSIO2 = new Division(902, 'SIO2');
    /*
     * Pour créer l'objet DateTime : $sadate = new DateTime('1994-10-03'); 
     * ou en indiquant le format grace à la méthode de classe createFromFormat
     */
    $sadate = DateTime::createFromFormat('j/m/Y', '3/10/1994');
    
    $madate = DateTime::createFromFormat('j/m/Y', '8/11/1994');
    /*
     * Création de l'objet $objPersonne
     */
    $objPersonne = new Personne(1,'DURANT','Max',$sadate,$objDivision);
    
    //echo $objPersonne->toString();
    
    $objPersonne->setNum(2);
    $objPersonne->setNom('MONTIEL');
    $objPersonne->setPrenom('Alexandre');
    $objPersonne->setDateNaissance($madate);
    $objPersonne->setDivision($objDivisionSIO2);
    /*
     * Affichage des propriétés de l'objet $objPersonne par appel de la méthode toString
     */
    /*echo'
    <br /><br />'.$objPersonne->toString();7*/
?>
