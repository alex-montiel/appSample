<div id="contenu">
    <h2>CHOISISSEZ UNE DIVISION</h2>
    <form action="index.php?uc=gererpersonne&amp;action=consulterpersonne" name="Consulterpersonne" method="post">
    <div class="corpsForm">    
        <select id="choixdiv" name="choixdiv">

            <?php         
            $colDivisions = PdoDivision::loadDivision();
            foreach($colDivisions as $objDiv){        
            ?>      
                <option id="division" value="<?php echo $objDiv->getCode(); ?>">
                    <?php echo $objDiv->getLibelle(); ?>
                </option>
            <?php 
            }
            ?>
    
        </select>
    </div>
    <div class="piedForm">
        <input type="submit" value="Consulter"</input>
    </div>
    </form>   
</div>
