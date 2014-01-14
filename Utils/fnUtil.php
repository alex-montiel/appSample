<?php
/**
 * Vérifie la validité des deux arguments : le code et le libellé de la division
 
 * des message d'erreurs sont ajoutés au tableau des erreurs
 
 * @param $code 
 * @param $libelle 
 */
function valideInfosDivision($code,$libelle){
	if($code==""){
		ajouterErreur("Le champ code ne doit pas être vide");
	}
	if($libelle == ""){
		ajouterErreur("Le champ libellé ne peut pas être vide");
	}
}
/**
 * Ajoute le libellé d'une erreur au tableau des erreurs 
 
 * @param $msg : le libellé de l'erreur 
 */
function ajouterErreur($msg){
   if (! isset($_REQUEST['erreurs'])){
      $_REQUEST['erreurs']=array();
	} 
   $_REQUEST['erreurs'][]=$msg;
}
/**
 * Retoune le nombre de lignes du tableau des erreurs 
 
 * @return le nombre d'erreurs
 */
function nbErreurs(){
   if (!isset($_REQUEST['erreurs'])){
	   return 0;
	}
	else{
	   return count($_REQUEST['erreurs']);
	}
}
/**
 * Ajoute le libellé d'un message d'info au tableau des messages 
 
 * @param $msg : le libellé du message 
 */
function ajouterMessage($msg){
   if (! isset($_REQUEST['messages'])){
      $_REQUEST['messages']=array();
	} 
   $_REQUEST['messages'][]=$msg;
}