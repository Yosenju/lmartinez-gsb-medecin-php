 <div id="contenu">
      <h2>Fiches de frais Visiteur</h2>
      <h3>Selectionner un Visiteur : </h3>
      <form action="index.php?uc=suiviFrais&action=voirDetailFicheFrais" method="post">
      <div class="corpsForm">
         
      <p>
	 
        <label for="lesVisiteurs" accesskey="n">Visiteur : </label>
        <select id="lesVisiteurs" name="lstFicheVA">
                <option selected value=""><?php echo  "Selectionnez un Visiteur"?></option>
            <?php
			foreach ($FichesVA as $uneFicheVA)
			{
			        $id=$uneFicheVA['idVisiteur'];
				$nom =  $uneFicheVA['nom'];
				$prenom =  $uneFicheVA['prenom'];
                                $mois = $uneFicheVA['mois'];
				
				?>
				<option  value="<?php echo $idFicheFrais=$id."/".$mois."/".$nom."/".$prenom   ?>"><?php echo  $nom." ".$prenom." ".$mois?> </option>
				<?php 
				
				
			
			}


           
		   ?>    
        </select> </br>
      
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>
