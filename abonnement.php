<?php
session_start();
require_once("Connexion.php");

class Abonnement extends Connexion
{
    function action()
    {
        $action = $_REQUEST['action'];
        $nom = $_REQUEST['contenu'];
        switch ($action) {
            case 'abonne':
                $this->abonne($nom);
                break;
            case 'desabonne':
                $this->desabonne($nom);
                break;
        }
    }
    function abonne($nom)
    {
        //on récupère l'id de l'utilisateur auquel on veut s'abonner
        $getId = "SELECT id FROM utilisateur WHERE userName = ?";
        $prepareId = parent::$bdd->prepare($getId);
        $tabId = array($nom);
        $exec = $prepareId->execute($tabId);
        $resultId = $prepareId->fetch();

        //on insert dans la table abonnement l'id de l'utilisateur et de l'abonné
        $abonne = "INSERT INTO abonnement (id_utilisateur_suivi, id_abonné) VALUES (?,?)";
        $prepareAbonne = parent::$bdd->prepare($abonne);
        $tabAbonne = array($resultId[0], $_SESSION['id']);
        $execAbonne = $prepareAbonne->execute($tabAbonne);
    }

    function desabonne($nom){
        //on récupère l'id de l'utilisateur auquel on veut se désabonner
        $getId = "SELECT id FROM utilisateur WHERE userName = ?";
        $prepareId = parent::$bdd->prepare($getId);
        $tabId = array($nom);
        $exec = $prepareId->execute($tabId);
        $resultId = $prepareId->fetch();

        //on supprime de la table abonnement l'id de l'utilisateur et de l'abonné
        $desabonne = "DELETE FROM abonnement WHERE id_utilisateur_suivi = ? AND id_abonné = ?";
        $prepareDesabonne = parent::$bdd->prepare($desabonne);
        $tabDesabonne = array($resultId[0], $_SESSION['id']);
        $execDesabonne = $prepareDesabonne->execute($tabDesabonne);
    }
}
Connexion::initConnexion();
$abonnement = new Abonnement();
$abonnement->action();
?>