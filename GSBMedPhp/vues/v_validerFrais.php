 <div id="contenu">
      <h2>Fiches de frais Visiteur</h2>
      <h3>Selectionner un Visiteur : </h3>
      <form action="index.php?uc=validerFrais&action=voirFicheFrais" method="post">
      <div class="corpsForm">
         
      <p>
	 
        <label for="lesVisiteurs" accesskey="n">Visiteur : </label>
        <select id="lesVisiteurs" name="lesVisiteurs">
                <option selected value=""><?php echo  "Selectionnez un Visiteur"?></option>
            <?php
			foreach ($lesVisiteurs as $unVisiteur)
			{
			        $id = $unVisiteur['idVisiteur'];
				$nom =  $unVisiteur['nom'];
				$prenom =  $unVisiteur['prenom'];
				if($visiteur == $visiteurASelectionner){
				?>
				<option selected value="<?php echo $id ?>"><?php echo  $nom." ".$prenom?> </option>
				<?php 
				}
				else{ ?>
				<option value="<?php echo $id ?>"><?php echo  $nom." ".$prenom?> </option>
				<?php 
				}
			
			}
           
		   ?>    
        </select> </br>
         <label for="lesMois" accesskey="m">Mois : </label>
         <select id="lesMois" name="LesMois">         
            <?php
			foreach ($lesMois as $unMois)
			{
			        $mois = $unMois['mois'];
				$libMois =  $unMois['libelle'];
				if($mois == $moisASelectionner){
				?>
				<option selected value="<?php echo $mois ?>"><?php echo  $libMois ?> </option>
				<?php 
				}
				else{ ?>
				<option value="<?php echo $mois ?>"><?php echo  $libMois ?> </option>
				<?php 
				}
			
			}
           
		   ?>    
      </select></label>
        
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>