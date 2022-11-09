<?php
require_once('Connexion.php');
class Modele_Biblio extends Connexion{
    public function __construct()
    {
    
    }
    public function getLivre(){
        
        $sql = "SELECT Livre.id, titre,resumeLivre,nbrLike,nbrVue,userName
        FROM Livre
        INNER JOIN Utilisateur
        WHERE Livre.IDAuteur = Utilisateur.id";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute(); 
        $result = $prepare->fetchAll();
        return $result;
    }
}
