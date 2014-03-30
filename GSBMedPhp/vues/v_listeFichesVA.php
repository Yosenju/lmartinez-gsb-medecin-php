<div id="contenu">

    <h3>Fiche de <?php echo $_SESSION['nomVaSelect']." ".$_SESSION['prenomVaSelect']?> </h3> 
    <h3>Du mois <?php echo $numMois . "-" . $numAnnee ?> : 
    </h3>
    <div id="corpsForm">
        <div id="encadre">
            <p>
                Etat : <?php echo $libEtat ?> depuis le <?php echo $dateModif ?> <br> Montant validé : <?php echo $montantValide ?>


            </p>
            <form name="MajFrais" action="index.php?uc=suiviFrais&action=ModifierEtatFiche" method="POST">
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
                            <td class="qteForfait"><?php echo $quantite ?></td>
                            <?php
                        }
                        ?>
                    </tr>                       
                </table>


                <table class="listeLegere">
                    <caption>Descriptif des éléments hors forfait - <?php echo $nbJustificatifs ?> justificatifs reçus -
                    </caption>

                    <tr>
                        <th class="date">Date</th>
                        <th class="libelle">Libellé</th>
                        <th class='montant'>Montant</th>

                    </tr>
                    <?php
                    foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                        $date = $unFraisHorsForfait['date'];
                        $libelle = $unFraisHorsForfait['libelle'];
                        $montant = $unFraisHorsForfait['montant'];
                        ?>
                        <tr>
                            <td><?php echo $date ?></td>
                            <td><?php echo $libelle ?></td>
                            <td><?php echo $montant ?></td>

                        </tr>
                        <?php
                    }
                    ?>

                </table>
                <input type="submit" name="Mise à jour" value ="Mettre à jour">
            </form>
        </div>
    </div>
</div>