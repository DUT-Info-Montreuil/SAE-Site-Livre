<?php
require_once('Connexion.php');
class ModeleNavBar extends Connexion {
    public function __construct()
    {

    }
    public function getLivres()
    {
        $sql = "SELECT titre, id FROM livre order by id asc";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }
}