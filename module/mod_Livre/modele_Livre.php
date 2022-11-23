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
    
}

