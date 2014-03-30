<div id="contenu">
    <h2>Fiches de frais Visiteur validées</h2>
    <h3>Selectionner un Visiteur : </h3>
    <form action="index.php?uc=suiviFrais&action=voirDetailFicheVA" method="post">
        <div class="corpsForm">

            <p>
                 
                <label for="lesVisiteurs" accesskey="n">Visiteur : </label>
                <select id="lesVisiteurs" name="lesVisiteurs">
                    <option selected value=""><?php echo "Selectionnez un Visiteur" ?></option>
                    <?php
                    foreach ($lesFichesVA as $uneFicheVA) {

                        $nom = $uneFicheVA['nom'];
                        $prenom = $uneFicheVA['prenom'];
                        $id= $uneFicheVA['id'];
                        $mois=$uneFicheVA['mois']
                        
                        
                        ?>
                        <option selected value="<?php $id+$mois?>"><?php echo $nom . " " . $prenom ." ".$mois?> </option>
                    <?php } ?>



            </p>
        </div>
        <div class="piedForm">
            <p>
                <input id="ok" type="submit" value="Valider" size="20" />
                <input id="annuler" type="reset" value="Effacer" size="20" />
            </p> 
        </div>

    </form>
