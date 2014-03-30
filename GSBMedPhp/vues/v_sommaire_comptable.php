    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
    
      </div>  
        <ul id="menuList">
			<li >
				  <?php echo $_SESSION['status'] ?> <br>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
			</li>
           <li class="smenu">
              <a href="index.php?uc=validerFrais&action=selectionnerVisiteur" title="Validation de fiches de frais">Validation de fiches de frais</a>
           </li>         
           <li class="smenu">
              <a href="index.php?uc=suiviFrais&action=listeNomVA" title="Suivi de fiches de frais">Suivi de fiches de frais</a>
           </li>
         
 	   <li class="smenu">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>  
    </div>
    