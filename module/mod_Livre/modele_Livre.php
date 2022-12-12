<?php
require_once('Connexion.php');
class Modele_Livre extends Connexion
{
    public function __construct()
    {
    }
    public function getLivre($idLivre)
    {

        $sql = "SELECT  Livre.id, titre,resumeLivre,nbrLike,nbrVue,userName, GROUP_CONCAT(genre SEPARATOR ',') as genres
        FROM Livre
        INNER JOIN Utilisateur
        ON Livre.IDAuteur = Utilisateur.id
        inner join LivreGenre
        ON LivreGenre.idLivre=Livre.id
        INNER JOIN Genre
        ON LivreGenre.idGenre=Genre.id
        WHERE Livre.id='$idLivre'
        GROUP BY Livre.id";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetch();
        if($result){
            return $result;
        }
        else{
            return false;
        }
    }
    public function isUserLikedThisBook($idUser,$idLivre){
        $sql = "SELECT count(*) FROM LikedBook where idLivre = $idLivre and idUser = $idUser;";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetch();

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
        $sql="SELECT count(*) as nbr FROM Chapitre where id_livre=$idLivre";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetch();
       
        return $result;

        
    }

    public function enregistreLivreLu($numChapitre, $idLivreLu){
        $dateTime = date("Y-m-d H:i:s");
        $verifLivreLu = "SELECT idLivre from viewedbook where idLivre = ? AND idUser = ?";
        $prepareVerifLu = parent::$bdd->prepare($verifLivreLu);
        $tabVerifLu = array($idLivreLu,$_SESSION['id']);
        $execVerifLu = $prepareVerifLu->execute($tabVerifLu);
        $resultVerifLu = $prepareVerifLu->fetchAll();
        if(count($resultVerifLu) === 0){
            $getLivreLu= "INSERT INTO viewedbook (idLivre,idUser,date_heure_lecture,dernier_chapitre_lu) VALUES (?,?,?,?)";
            $prepareLivreLu = parent::$bdd->prepare($getLivreLu);
            $tabLivreLu = array($idLivreLu, $_SESSION["id"], $dateTime, $numChapitre);
            $execLivreLu = $prepareLivreLu->execute($tabLivreLu);
        }
        else {
            $updateLivreLu= "UPDATE viewedbook SET date_heure_lecture = ?, dernier_chapitre_lu = ? WHERE idUser = ? AND idLivre = ?";
            $updateLivreLu = parent::$bdd->prepare($updateLivreLu);
            $tabLivreLu = array($dateTime,$numChapitre,$_SESSION["id"],$idLivreLu);
            $execLivreLu = $updateLivreLu->execute($tabLivreLu);
        }
    }
    
}

