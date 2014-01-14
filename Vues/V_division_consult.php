<div id="contenu">
<h2>LISTE DES DIVISIONS</h2>
<table>
  <tr>
    <th>Code division</th>
    <th>Libellé division</th>
  </tr>
	<?php 
	foreach ($colDivisions as $objDivision){
	?>  
  <tr>
    <td><?php echo $objDivision->getCode()?></td>
    <td><?php echo $objDivision->getLibelle()?></td>
  </tr>
  	<?php 
	}
	?>
</table>
</div>