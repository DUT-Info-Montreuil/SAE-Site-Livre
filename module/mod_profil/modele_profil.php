<?php
class modele_profil extends Connexion {
    function recupInfoAffichage(){
        $prepare = parent::$bdd->prepare("SELECT email FROM Utilisateur where userName = ?");
        $tab = array($_SESSION["identifiant"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetch();
        $_SESSION["email"] = $result[0];
    }
    function changeNom(){
        $prepare = parent::$bdd->prepare("Update Utilisateur SET userName= ? where userName = ?");
        $tab = array($_POST["newName"],$_SESSION["identifiant"]);
        $exec = $prepare->execute($tab);
        $_SESSION["identifiant"] = $_POST["newName"];
    }
    function changeEmail(){
        $prepare = parent::$bdd->prepare("Update Utilisateur SET email= ? where userName = ?");
        $tab = array($_POST["newEmail"],$_SESSION["identifiant"]);
        $exec = $prepare->execute($tab);
        $_SESSION["email"] = $_POST["newEmail"];
    }
    function changeMDP(){
        $prepare = parent::$bdd->prepare("Update Utilisateur SET passWord= ? where userName = ?");
        $tab = array(password_hash($_POST["newMDP"] , PASSWORD_DEFAULT),$_SESSION["identifiant"]);
        $exec = $prepare->execute($tab);
    }
    function getLivresLu(){
        $prepare = parent::$bdd->prepare("select * from livre inner join historique_livre_lu hll on livre.id = hll.id_livre_lu where hll.id_utilisateur = ?");
        $tab = array($_SESSION["id"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetchAll();
        return $result;
    }
}