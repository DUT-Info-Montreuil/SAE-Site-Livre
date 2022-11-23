<?php
include_once('Connexion.php');

class TempSave extends Connexion {
    public function save() {
        $idChapitre = $_REQUEST["idChapitre"];
        $idAuteur = $_REQUEST["idAuteur"];
        $story = $_REQUEST["story"];
        $numPage = $_REQUEST["numPage"];
        $idPage = $_REQUEST["idPage"];
        //$prepare = parent::$bdd->prepare("INSERT into TempSave (story, idLivre, idAuthor,idPage) VALUES(story = :story,idlivre = :idlivre,idauteur = :idauteur , 1) on DUPLICATE KEY UPDATE story = :story;");
        $prepare = parent::$bdd->prepare("INSERT into TempSave (idPage, numeroPage , TexteDeLaPage ,id_chapitre ) VALUES(?, ? ,? ,?) on DUPLICATE KEY UPDATE TexteDeLaPage=?;");
        $prepare->execute(array($idPage ,$numPage , $story , $idChapitre , $story ) ) ; 
        /*$prepare->execute(array(
            'story' => $story,
            'idlivre' => $idLivre,
            'idauteur' => $idAuteur
        ));*/
        
    }
}

Connexion::initConnexion();
$save = new TempSave();
$save->save();
