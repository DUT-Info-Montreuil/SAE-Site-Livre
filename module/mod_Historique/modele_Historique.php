<?php

class Modele_Historique extends Connexion {
    public function __construct() {
        parent::__construct();
    }
    public function getHistoriqueLecture() {
        $prepare = parent::$bdd->prepare("select * from livre inner join historique_livre_lu hll on livre.id = hll.id_livre_lu where hll.id_utilisateur = ? ORDER BY hll.date_heure_lecture DESC");
        $tab = array($_SESSION["id"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetchAll();
        return $result;
    }
    public function getMonHistoriqueEcriture() {
        $sql = "SELECT * FROM livre WHERE IDAuteur = ?";
        $prepare = parent::$bdd->prepare($sql);
        $tab = array($_SESSION["id"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetchAll();
        return $result;
    }

    public function getHistoriqueEcriture() {
        $sql = "SELECT * FROM livre WHERE IDAuteur = ?";
        $prepare = parent::$bdd->prepare($sql);
        $tab = array($_GET["id"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetchAll();
        return $result;
    }

    public function getNomAutre(){
        $sql = "SELECT userName FROM utilisateur WHERE id = ?";
        $prepare = parent::$bdd->prepare($sql);
        $tab = array($_GET["id"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetch();
        return $result[0];
    }
}
