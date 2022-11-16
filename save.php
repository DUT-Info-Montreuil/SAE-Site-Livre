<?php
include_once('Connexion.php');

class Save extends Connexion {
    public function save() {
        $idLivre = $_REQUEST["idLivre"];
        $idAuteur = $_REQUEST["idAuteur"];
        $story = $_REQUEST["story"];
        $prepare = parent::$bdd->prepare("INSERT into TempSave (story, idLivre, idAuthor,idPage) VALUES(story = :story,idlivre = :idlivre,idauteur = :idauteur , 1) on DUPLICATE KEY UPDATE story = :story;");
        $prepare->execute(array(
            'story' => $story,
            'idlivre' => $idLivre,
            'idauteur' => $idAuteur
        ));
        
    }
}

Connexion::initConnexion();
$save = new Save();
$save->save();
