<?php
include("vues/v_sommaire_comptable.php");
$ficheVA = isset($_SESSION['ficheSelect']) ? $_SESSION['ficheSelect'] : null ;
$idVisiteurVaSelect=isset($_SESSION['visiteurVaSelect']) ? $_SESSION['visiteurVaSelect'] : null ;
$moisVaSelect= isset($_SESSION['moisVaSelect']) ? $_SESSION['moisVaSelect'] : null ;
$nomVaSelect=isset($_SESSION['nomVaSelect']) ? $_SESSION['nomVaSelect'] : null ;
$prenomVaSelect=isset($_SESSION['prenomVaSelect']) ? $_SESSION['prenomVaSelect'] : null ;


$action = $_REQUEST['action'];

switch($action){
	
        case'listeNomVA':{
            $FichesVA=$pdo->getListeVA();
            include ("vues/v_listeNomVA.php");
            break;
        }
        case 'voirDetailFicheFrais':{
            $FichesVA=$pdo->getListeVA();
            $ficheSelect=isset($_REQUEST['lstFicheVA']) ? $_REQUEST['lstFicheVA'] : null;
            
            if($ficheSelect){
                $_SESSION['ficheSelect']=$ficheSelect;
                $VisiteurVa=explode("/",$ficheSelect);
                $idVisiteurVa=$VisiteurVa[0];
                $moisVa=$VisiteurVa[1];
				$nomVa=$VisiteurVa[2];
				$prenomVa=$VisiteurVa[3];
                $_SESSION['visiteurVaSelect']=$idVisiteurVa;
                $_SESSION['moisVaSelect']=$moisVa;
				$_SESSION['nomVaSelect']=$nomVa;
				$_SESSION['prenomVaSelect']=$prenomVa;
                $leMois = $_SESSION['moisVaSelect'];
                $unVisiteur = $_SESSION['visiteurVaSelect'];
				$nomVisiteurVa=$_SESSION['nomVaSelect'];
				$preVisiteurVa=$_SESSION['prenomVaSelect'];
                $lesFraisHorsForfait=$pdo->getLesFraisHorsForfait($unVisiteur,$leMois);
                $lesFraisForfait=$pdo->getLesFraisForfait($unVisiteur,$leMois);
                $lesInfosFicheFrais=$pdo->getLesInfosFicheFrais($unVisiteur,$leMois);
                $numAnnee=  substr($leMois,0,4);
                $numMois= substr($leMois,4,2);
                $libEtat=$lesInfosFicheFrais['libEtat'];
                $montantValide=$lesInfosFicheFrais['montantValide'];
                $nbJustificatifs=$lesInfosFicheFrais['nbJustificatifs'];
                $dateModif=$lesInfosFicheFrais['dateModif'];
                $dateModif=  dateAnglaisVersFrancais($dateModif);
                include ("vues/v_listeFichesVA.php");
                break;
                
                
                
            }
        }
        case 'ModifierEtatFiche':{
            $pdo->majEtatFicheFrais($_SESSION['visiteurVaSelect'],$_SESSION['moisVaSelect'],'RB');
            header('Location:index.php?uc=suiviFrais&action=listeNomVA');
            break;
        }
 
}


?>
