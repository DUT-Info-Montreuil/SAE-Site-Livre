<?php
class modele_profil extends Connexion {
    function recupInfoAffichage(){
        $prepare = parent::$bdd->prepare("SELECT email FROM Utilisateur where userName = ?");
        $tab = array($_SESSION["identifiant"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetch();
        $_SESSION["email"] = $result[0];
    }
}