<div id="contenu">
    <?php 
    
    $numPersonne = $objPersonne->getNum();
    $nomPersonne = $objPersonne->getNom();
    $prenomPersonne = $objPersonne->getPrenom();
    $objDiv = $objPersonne->getDivision();
    echo $objDiv->getCode();
    echo $objDiv->getLibelle();
    $libDiv = $objDiv->getLibelle();
    $dateNaissance = $objPersonne->getDateNaissance()->format('Y-m-d');
    
    ?>
    <h2>MODIFIER UNE PERSONNE</h2>   
    <div class ="corpsForm">
        <h3>Modifiez les champs que vous désirez</h3>
        <form action="index.php?uc=gererpersonne&amp;action=validmodifpersonne&amp;id=<?php echo $numPersonne; ?>" name="Modifierpersonne" method="post">

        <label for="nom">
            Nom :
            <input id="nom" name="nom" value="<?php echo $nomPersonne; ?>" type="text">
            <br />
        </label>
        <label for="prenom">
            Prenom :
            <input id="prenom" name="prenom" value="<?php echo $prenomPersonne; ?>" type="text">
            <br />
        </label>
        <label for="dateNaissance">
            Date de Naissance :
            <input id="dateNaissance" name="dateNaissance" value="<?php echo $dateNaissance; ?>" type="datetime">
            <br />
        </label>
        Division : 
        <select id="choixdiv" name="choixdiv" value="<?php echo $libDiv; ?>" selected value="<?php echo $libDiv; ?>">
            <?php           
            foreach($colDivision as $objDiv){
            ?>
                <option id="division" value="<?php echo $objDiv->getCode(); ?>">
                    <?php echo $objDiv->getLibelle(); ?>
                </option>
            <?php
            }
            ?>
        </select><br /><br /><br />
    </div>
    <div class="piedForm">
        <input type="submit" value="Modifier"</input>
        <input type="reset" value="Annuler"</input>
    </div>
    </form>
</div>
