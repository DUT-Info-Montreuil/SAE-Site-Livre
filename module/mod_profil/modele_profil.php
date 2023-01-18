<?php

class modele_profil extends Connexion {
    function verifExiste()
    {
        $req = parent::$bdd->prepare("SELECT * FROM Utilisateur WHERE id = ?");
        $req->execute(array(htmlspecialchars($_GET["id"])));
        $resultat = $req->fetch();
        return $resultat;
    }
    function getAutreEmail(){
        $prepare = parent::$bdd->prepare("SELECT email FROM Utilisateur where id = ?");
        $tab = array(htmlspecialchars($_GET["id"]));
        $exec = $prepare->execute($tab);
        $result = $prepare->fetch();
        return $result[0];
    }
    function getAutreNom(){
        $prepare = parent::$bdd->prepare("SELECT userName FROM Utilisateur where id = ?");
        $tab = array(htmlspecialchars($_GET["id"]));
        $exec = $prepare->execute($tab);
        $result = $prepare->fetch();
        return $result[0];
    }
    function changeNom($nouvNom){
        $prepare = parent::$bdd->prepare("Update Utilisateur SET userName= ? where userName = ?");
        $tab = array($nouvNom,$_SESSION["identifiant"]);
        $exec = $prepare->execute($tab);
        $_SESSION["identifiant"] = $nouvNom;
    }
    function changeEmail($nouvEmail){
        $prepare = parent::$bdd->prepare("Update Utilisateur SET email= ? where userName = ?");
        $tab = array($nouvEmail,$_SESSION["identifiant"]);
        $exec = $prepare->execute($tab);
        $_SESSION["email"] = $nouvEmail;
    }
    function changeMDP($nouvMDP){
        $prepare = parent::$bdd->prepare("Update Utilisateur SET passWord= ? where userName = ?");
        $tab = array(password_hash($nouvMDP, PASSWORD_DEFAULT),$_SESSION["identifiant"]);
        $exec = $prepare->execute($tab);
    }

    function getMesDeuxDerniersLivresLu(){
        $prepare = parent::$bdd->prepare("select *, userName from Livre inner join ViewedBook hll on Livre.id = hll.idLivre inner join Utilisateur  on Livre.IDAuteur = Utilisateur.id where hll.idUser = ? ORDER BY hll.date_heure_lecture DESC LIMIT 2");
        $tab = array($_SESSION["id"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetchAll();
        return $result;
    }

    function getTousMesLivresLu(){
        $prepare = parent::$bdd->prepare("select * from Livre inner join viewedbook hll on Livre.id = hll.idLivre where hll.idUser = ? ORDER BY hll.date_heure_lecture DESC");
        $tab = array($_SESSION["id"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetchAll();
        return $result;
    }
    function getMesLivresEcrits(){
        $prepare = parent::$bdd->prepare("select * from Livre where IDAuteur = ? LIMIT 2");
        $tab = array($_SESSION["id"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetchAll();
        return $result;
    }
    function getAutreLivresEcrits(){
        $prepare = parent::$bdd->prepare("select * from Livre  where IDAuteur = ? LIMIT 2");
        $tab = array(htmlspecialchars($_GET["id"]));
        $exec = $prepare->execute($tab);
        $result = $prepare->fetchAll();
        return $result;
    }
    function verifAbonne(){
        $prepare = parent::$bdd->prepare("select * from abonnement where id_utilisateur_suivi = ? and id_abonné = ?");
        $tab = array(htmlspecialchars($_GET["id"]), $_SESSION["id"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetchAll();
        if(count($result) === 0){
            return false;
        }
        else {
            return true;
        }
    }
    function getMesAbonnements(){
        $prepare = parent::$bdd->prepare("select * from Utilisateur inner join abonnement on Utilisateur.id = abonnement.id_utilisateur_suivi where abonnement.id_abonné = ?");
        $tab = array($_SESSION["id"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetchAll();
        return $result;
    }
}