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
       
        $prepare = parent::$bdd->prepare("SELECT count(*) FROM LikedBook where idLivre =? and idUser =?;");
        $exec = $prepare->execute(array( $idLivre , $idUser));
        $result = $prepare->fetch();

        return $result;
    }
    public function getChapitre($chapitre,$livre){
        
      
        $prepare = parent::$bdd->prepare("SELECT titre,id FROM Chapitre where numeroChap=? and id_livre=?;");
        $exec = $prepare->execute(array($chapitre,$livre));
        $result = $prepare->fetch();
        if ($result == false){
            $result["titre"] = "Aucun chapitre n'a été créé pour ce livre";
            $result["id"] = -1;
            }
        return $result;

    }
    public function getAllChap($livre){
        
        $prepare = parent::$bdd->prepare("SELECT * FROM Chapitre where id_livre=?;");
        $exec = $prepare->execute(array($livre));
        $result = $prepare->fetchAll();
        return $result;
    }
    public function getPages($chapitre){
        
        $prepare = parent::$bdd->prepare("SELECT TexteDeLaPage, numeroPage FROM Page where Page.id_chapitre=?");
        $exec = $prepare->execute(array($chapitre));
        $result = $prepare->fetchAll();
        if ($result == false){
            $result[0]["TexteDeLaPage"] = "Aucune page n'a été créée pour ce chapitre";
            $result[0]["numeroPage"] = 0;
            }
        return $result;
    }
    public function getNbrChapLivre($idLivre){
        
        $prepare = parent::$bdd->prepare("SELECT count(*) as nbr FROM Chapitre where id_livre=?;");
        $exec = $prepare->execute(array($idLivre));
        $result = $prepare->fetch();
       
        return $result;

        
    }

    public function enregistreLivreLu($numChapitre, $idLivreLu){
        $dateTime = date("Y-m-d H:i:s");
        $verifLivreLu = "SELECT idLivre from ViewedBook where idLivre = ? AND idUser = ?";
        $prepareVerifLu = parent::$bdd->prepare($verifLivreLu);
        $tabVerifLu = array($idLivreLu,$_SESSION['id']);
        $execVerifLu = $prepareVerifLu->execute($tabVerifLu);
        $resultVerifLu = $prepareVerifLu->fetchAll();
        if(count($resultVerifLu) === 0){
            $getLivreLu= "INSERT INTO ViewedBook (idLivre,idUser,date_heure_lecture,dernier_chapitre_lu) VALUES (?,?,?,?)";
            $prepareLivreLu = parent::$bdd->prepare($getLivreLu);
            $tabLivreLu = array($idLivreLu, $_SESSION["id"], $dateTime, $numChapitre);
            $execLivreLu = $prepareLivreLu->execute($tabLivreLu);
        }
        else {
            $updateLivreLu= "UPDATE ViewedBook SET date_heure_lecture = ?, dernier_chapitre_lu = ? WHERE idUser = ? AND idLivre = ?";
            $updateLivreLu = parent::$bdd->prepare($updateLivreLu);
            $tabLivreLu = array($dateTime,$numChapitre,$_SESSION["id"],$idLivreLu);
            $execLivreLu = $updateLivreLu->execute($tabLivreLu);
        }
    }
    
}

