<h3>Du mois <?php echo $numMois . "-" . $numAnnee ?> : 
</h3>
<div class="encadre">
    <p>
        Etat : <?php echo $libEtat ?> depuis le <?php echo $dateModif ?> <br> Montant validé : <?php echo $montantValide ?>


    </p>
    <form name="MajFrais" action="index.php?uc=validerFrais&action=ModifierFicheFrais" method="POST">
        <table class="listeLegere">
            <caption>Eléments forfaitisés </caption>
            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $libelle = $unFraisForfait['libelle'];
                    ?>	
                    <th> <?php echo $libelle ?></th>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $idFrais = $unFraisForfait['idfrais'];
                    $quantite = $unFraisForfait['quantite'];
                    ?>
                    <td class="qteForfait"> <input name="lesFrais[<?php echo $idFrais ?>]" value="<?php echo $quantite ?>"</td>
                    <?php
                }
                ?>
            </tr>                       
        </table>
        <input type="submit" value="Validez"  style="float:right;"></input>  
        </br>
    </form> 
    <table class="listeLegere">
        <caption>Descriptif des éléments hors forfait - nombre de justificatif <?php echo $nbJustificatifs ?> justificatifs reçus -
        </caption>
        <tr>
            <th class="date">Date</th>
            <th class="libelle">Libellé</th>
            <th class='montant'>Montant</th>
            <th class='montant'>Refuser</th>
            <th class='montant'>Reporter</th>
        </tr>
        <?php
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $date = $unFraisHorsForfait['date'];
            $libelle = $unFraisHorsForfait['libelle'];
            $montant = $unFraisHorsForfait['montant'];
            $id = $unFraisHorsForfait['id'];
            ?>
            <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <td><a href="index.php?uc=validerFrais&action=refusFrais&id=<?php echo $id ?>" onclick="return confirm('Voulez vous vraiment REFUSER ce frais');">REFUSER</a> </td>                  
                <td><a href="index.php?uc=validerFrais&action=reporterFrais&id=<?php echo $id ?>" onclick="return confirm('Voulez vous vraiment REPORTER ce frais');">REPORTER</a></td>
            </tr>
            <?php
        }
        ?>     
    </table>    
<form action="index.php?uc=validerFrais&action=validationFiche" method="POST" style="text-align:right;">
    <input type="submit" value="Validez la Fiche !" >
</form>
</div>
</div>
