<?php

class Modele_Historique extends Connexion {
    public function __construct() {
        parent::__construct();
    }
    function verifExiste()
    {
        $req = parent::$bdd->prepare("SELECT * FROM utilisateur WHERE id = ?");
        $req->execute(array(htmlspecialchars($_GET["id"])));
        $resultat = $req->fetch();
        return $resultat;
    }
    public function getHistoriqueLecture() {
        $prepare = parent::$bdd->prepare("select *, userName from Livre inner join viewedbook hll on Livre.id = hll.idLivre inner join utilisateur u on Livre.IDAuteur = u.id where hll.idUser = ? ORDER BY hll.date_heure_lecture DESC");
        $tab = array($_SESSION["id"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetchAll();
        return $result;
    }
    public function getMonHistoriqueEcriture() {
        $sql = "SELECT * FROM Livre WHERE IDAuteur = ?";
        $prepare = parent::$bdd->prepare($sql);
        $tab = array($_SESSION["id"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetchAll();
        return $result;
    }

    public function getHistoriqueEcriture() {
        $sql = "SELECT * FROM Livre WHERE IDAuteur = ?";
        $prepare = parent::$bdd->prepare($sql);
        $tab = array(htmlspecialchars($_GET["id"]));
        $exec = $prepare->execute($tab);
        $result = $prepare->fetchAll();
        return $result;
    }

    public function getNomAutre(){
        $sql = "SELECT userName FROM utilisateur WHERE id = ?";
        $prepare = parent::$bdd->prepare($sql);
        $tab = array(htmlspecialchars($_GET["id"]));
        $exec = $prepare->execute($tab);
        $result = $prepare->fetch();
        return $result[0];
    }
}
