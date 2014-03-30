<div id="contenu">
    <h2>Fiches de frais Visiteur</h2>
    <h3>Selectionner un Visiteur : </h3>
    <form action="index.php?uc=validerFrais&action=voirFicheFrais" method="post">
        <div class="corpsForm">

            <p>

                <label for="lesVisiteurs" accesskey="n">Visiteur : </label>
                <select id="lesVisiteurs" name="lstVisiteurs">
                    <option value="-1"><?php echo "Selectionnez un Visiteur" ?></option>
                    <?php
                    foreach ($lesVisiteurs as $leVisiteur) {
                        $id = $leVisiteur['id'];
                        $nom = $leVisiteur['nom'];
                        $prenom = $leVisiteur['prenom'];
                        if ($id == $unVisiteur) {
                            ?>
                            <option selected value="<?php echo $id ?>"><?php echo $nom . " " . $prenom ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $id ?>"><?php echo $nom . " " . $prenom ?> </option>
                            <?php
                        }
                    }
                    ?>    
                </select> </br>
                <label for="lesMois" accesskey="m">Mois : </label>
                <select id="lesMois" name="lstMois">         
                    <?php
                    foreach ($lesMois as $leMois) {
                        $mois = $leMois['mois'];
                        $libMois = $leMois['libelle'];
                        if ($mois == $unMois) {
                            ?>
                            <option selected value="<?php echo $mois ?>"><?php echo $libMois ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $mois ?>"><?php echo $libMois ?> </option>
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