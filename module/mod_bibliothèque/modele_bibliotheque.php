<?php
require_once('Connexion.php');

class Modele_Biblio extends Connexion
{
    public function __construct()
    {
    }

    public function getLivres()
    {

        $sql = "SELECT  Livre.id, titre,resumeLivre,nbrLike,nbrVue,userName, GROUP_CONCAT(genre SEPARATOR ',') as genres
        FROM Livre
        INNER JOIN Utilisateur
        ON Livre.IDAuteur = Utilisateur.id
        inner join LivreGenre
        ON LivreGenre.idLivre=Livre.id
        INNER JOIN Genre
        ON LivreGenre.idGenre=Genre.id
        GROUP BY Livre.id";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }

    public function getGenres()
    {
        $sql = "SELECT * FROM genre";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }

    /*  public function getGenres($idLivre){
       $sql = "SELECT genre FROM Genre inner join LivreGenre on LivreGenre.idGenre = Genre.id WHERE LivreGenre.idLivre=$idLivre LIMIT 3  ";
       $prepare = parent::$bdd->prepare($sql);
       $exec = $prepare->execute();
       $result = $prepare->fetchAll();
       return $result;
   }*/


}

