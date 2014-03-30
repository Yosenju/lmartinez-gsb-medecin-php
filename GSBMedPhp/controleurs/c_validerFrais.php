<?php

include("vues/v_sommaire_comptable.php");
$unVisiteur = isset($_SESSION['visiteurSelect']) ? $_SESSION['visiteurSelect'] : null ;
$unMois = isset($_SESSION['moisSelect']) ? $_SESSION['moisSelect'] : null;
$action = $_REQUEST['action'];
$modif = isset($_SESSION['modif']) ? $_SESSION['modif'] : null;
$refus = isset($_SESSION['refus']) ? $_SESSION['refus'] : null;
$report = isset($_SESSION['report']) ? $_SESSION['report'] : null;

switch ($action) {
    case 'selectionnerVisiteur': {
            $lesVisiteurs = $pdo->getLesVisiteur();
            $lesMois = getLesSixDernierMois();   
            include("vues/v_validerFraisSelectVisiteur.php");
            break;
        }
    case 'voirFicheFrais': {
            $lesVisiteurs = $pdo->getLesVisiteur();
            $lesMois = getLesSixDernierMois();           
            $visiteurSelect = isset($_REQUEST['lstVisiteurs']) ? $_REQUEST['lstVisiteurs'] : null;
            $moisSelect = isset($_REQUEST['lstMois']) ? $_REQUEST['lstMois'] : null;
            if ($visiteurSelect && $moisSelect) {
                $_SESSION['visiteurSelect'] = $visiteurSelect;
                $_SESSION['moisSelect'] = $moisSelect;
                $unVisiteur = $_SESSION['visiteurSelect'];
                $unMois = $_SESSION['moisSelect'];
            }
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($unVisiteur, $unMois);
            $lesFraisForfait = $pdo->getLesFraisForfait($unVisiteur, $unMois);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($unVisiteur, $unMois,'CL');
            $numAnnee = substr($unMois, 0, 4);
            $numMois = substr($unMois, 4, 2);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif'];
            $dateModif = dateAnglaisVersFrancais($dateModif);
            include("vues/v_validerFraisSelectVisiteur.php");
            if ($lesInfosFicheFrais) {
                if ($modif) {
                ajouterMessage("Modification Effectuée");
                include("vues/v_message.php");
                unset($_SESSION['modif']);
                }
                if ($refus) {
                ajouterMessage("Le frais a été refusé !");
                include("vues/v_message.php");
                unset($_SESSION['refus']);
                }
                 if ($report) {
                ajouterMessage("Report Effectués");
                include("vues/v_message.php");
                unset($_SESSION['report']);
                }
                include("vues/v_comptableAfficheFrais.php");
            } else {
                ajouterErreur("Pas de fiches pour le mois selectionné");
                include("vues/v_erreurs.php");
            }                     
            break;
        }
    case 'ModifierFicheFrais': {
            $lesFrais = $_REQUEST['lesFrais'];
            $nbJustificatifs = $_REQUEST['nbJustificatif'];
            $pdo->majFraisForfait($unVisiteur, $unMois, $lesFrais);
            $_SESSION['modif']=TRUE;
            header('Location:index.php?uc=validerFrais&action=voirFicheFrais');         
            break;
        }
    case 'reporterFrais':{
            $id=$_REQUEST['id'];
            $moiSuivant= getMoisSuivant($unMois);
            $pdo->reporterFraisHorsForfait($unVisiteur,$moiSuivant,$id);
            $_SESSION['report']=TRUE;
            header('Location:index.php?uc=validerFrais&action=voirFicheFrais');
            break;
    }
    case 'refusFrais':{            
            $id=$_REQUEST['id'];
            $pdo->refusFraisHorsForfait($id);
            $_SESSION['refus']=TRUE;
            header('Location:index.php?uc=validerFrais&action=voirFicheFrais');
            break;
    }
    case 'validationFiche':{    
            $pdo->majEtatFicheFrais($unVisiteur, $unMois,"VA");
            header('Location:index.php?uc=validerFrais&action=selectionnerVisiteur');
            break;
    }
}
?>

