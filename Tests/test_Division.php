<?php
	/*
	 * Appel du constructeur de la classe Division pour cr�er l'instance $objDiv
	 */
	$objDiv = new Division(801,'SIO1');

	/*
	 * Test des m�thode get et toString
	 */
	//echo "Test m�thode toString() : (doit afficher 801 SIO1) : <strong>" . $objDiv->toString() . "</strong>";

	//echo "<br /><br />Test m�thode getCode() : (doit afficher 801) : <strong>" . $objDiv->getCode(). "</strong>";
	//echo "<br /><br />Test m�thode getLibelle() : (doit afficher SIO1) : <strong>" . $objDiv->getLibelle(). "</strong>";

	/* 
	 * test des m�thodes set
	 */

	$objDiv->setCode("901");
	$objDiv->setLibelle("SIO2");

	//echo "<br /><br />V�rification de la modification du code et du libell� de la division : (doit afficher 901 SIO2) : <strong>" . $objDiv->toString(). "</strong>";