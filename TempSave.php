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
        //"INSERT into Page (idPage, numeroPage , TexteDeLaPage ,id_chapitre ) VALUES(?, ? ,? ,?) on DUPLICATE KEY UPDATE TexteDeLaPage=?;"
        $prepare = parent::$bdd->prepare("UPDATE Page SET TexteDeLaPage = ?  WHERE ID = ?");
        $prepare->execute(array( $story  , $idPage) ) ; 
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
