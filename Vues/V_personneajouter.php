<div id="contenu">
    
    <h2>AJOUTER UNE PERSONNE</h2>   
    <div class ="corpsForm">
        <h3>Veuillez renseignez les informations suivantes</h3>
        <form action="index.php?uc=gererpersonne&amp;action=validajoutpersonne" name="Ajouterpersonne" method="post">
        <label for="num">
            Numero :
            <input id="num" name="num" type="text">
            <br />
        </label>
        <label for="nom">
            Nom :
            <input id="nom" name="nom" type="text">
            <br />
        </label>
        <label for="prenom">
            Prenom :
            <input id ="prenom" name="prenom" type="text">
            <br />
        </label>
        <label for="dateNaissance">
            Date de Naissance :
            <input id="dateNaissance" name="dateNaissance" type="datetime">
            <br />
        </label>
        Division : 
        <select id="choixdiv" name="choixdiv" >
            <?php
            
            foreach($colDivision as $objDiv){
            ?>
                <option id="division" value="<?php echo $objDiv->getCode() ?>">
                    <?php echo $objDiv->getLibelle() ?>
                </option>
            <?php
            }
            ?>
        </select><br /><br /><br />
    </div>
    <div class="piedForm">
        <input type="submit" value="Envoyer"</input>
        <input type="reset" value="Annuler"</input>
    </div>
    </form>
</div>

