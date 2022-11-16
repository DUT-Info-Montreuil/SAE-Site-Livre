<?php
require_once('Connexion.php');
class Modele_Livre extends Connexion
{
    public function __construct()
    {
    }
    public function getLivre($idLivre)
    {
        $sql = "SELECT * FROM Livre where id='$idLivre'";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }
    public function getChapitre($chapitre,$livre){
        
        $sql = "SELECT titre,id FROM Chapitre where numeroChap=$chapitre and id_livre=$livre";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetch();
        return $result;

    }
    public function getAllChap($livre){
        $sql = "SELECT * FROM Chapitre where id_livre=$livre";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }
    public function getPages($chapitre){
        $sql="SELECT TexteDeLaPage, numeroPage FROM Page where Page.id_chapitre=$chapitre";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }
    public function getNbrChapLivre($idLivre){
        $sql="SELECT NbrDeChapitre FROM Livre where id=$idLivre";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetch();
        return $result;
    }

    public function enregistreLivreLu($idLivreLu){
        $dateTime = date("Y-m-d H:i:s");
        $verifLivreLu = "SELECT id_livre_lu from historique_livre_lu where id_livre_lu = ?";
        $prepareVerifLu = parent::$bdd->prepare($verifLivreLu);
        $tabVerifLu = array($idLivreLu);
        $execVerifLu = $prepareVerifLu->execute($tabVerifLu);
        $resultVerifLu = $prepareVerifLu->fetchAll();
        if(count($resultVerifLu) == 0){
            $getLivreLu= "INSERT INTO historique_livre_lu (id_utilisateur,id_livre_lu,date_heure_lecture) VALUES (?,?,?)";
            $prepareLivreLu = parent::$bdd->prepare($getLivreLu);
            $tabLivreLu = array($_SESSION["id"],$idLivreLu, $dateTime);
            $execLivreLu = $prepareLivreLu->execute($tabLivreLu);
        }
        else {
            $updateLivreLu= "UPDATE historique_livre_lu SET date_heure_lecture = ? WHERE id_utilisateur = ? AND id_livre_lu = ?";
            $updateLivreLu = parent::$bdd->prepare($updateLivreLu);
            $tabLivreLu = array($dateTime,$_SESSION["id"],$idLivreLu);
            $execLivreLu = $updateLivreLu->execute($tabLivreLu);
        }
    }
    
}

