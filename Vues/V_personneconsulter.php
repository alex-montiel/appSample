<div id="contenu">
    <h2>LISTE DES PERSONNES</h2>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Age</th>
                <th>Division</th>
                <th></th>
                <th></th>
            </tr>
                <?php foreach($colPers as $objPersonne){ ?>
            <tr>
                <td><?php echo $objPersonne->getNom(); ?></td>
                <td><?php echo $objPersonne->getPrenom(); ?></td>
                <td><?php echo $objPersonne->calculAge(); ?></td>
                <td><?php echo $objPersonne->getDivision()->getLibelle(); ?></td>

                <td><a href="index.php?uc=gererpersonne&amp;action=modifierpersonne&amp;id=<?php echo $objPersonne->getNum(); ?>">Modifier</a></td>
                <td><a href="index.php?uc=gererpersonne&amp;action=supprimerpersonne&amp;id=<?php echo $objPersonne->getNum(); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette personne');">Supprimer</a></td>
            </tr>
                <?php } ?>
        </table>
    
</div>
