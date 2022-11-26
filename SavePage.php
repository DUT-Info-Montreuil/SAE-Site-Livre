<?php
include_once('Connexion.php');

class SavePage extends Connexion{
    public function save(){
        $idChapitre = $_REQUEST["idChapitre"];
        $idAuteur = $_REQUEST["idAuteur"];
        $story = $_REQUEST["story"];
        $numPage = $_REQUEST["numPage"];
        $idPage = $_REQUEST["idPage"];
        
        $prepare = parent::$bdd->prepare("SELECT * FROM TempSave WHERE idPage = ? AND id_chapitre = ? AND numeroPage = ? ;");
        $exec = $prepare->execute(array($idPage , $idChapitre , $numPage));
        $result = $prepare->fetchAll();
        
        $prepare2 = parent::$bdd->prepare("INSERT INTO Page (ID , numeroPage , TesteDeLaPage , id_chapitre) VALUES(? , ? , ? , ?) ON DUPLICATE KEY UPDATE TexteDeLaPage = ? WHERE ID = ? ;");
        $exec2 = $prepare2->execute(array( $idPage,$numPage,$result[0]["TexteDeLaPage"],$idChapitre,$result[0]["TexteDeLaPage"] , $idPage));

        $prepare3 = parent::$bdd->prepare("DELETE FROM TempSave WHERE idPage = ? AND id_chapitre = ? AND numeroPage = ? ;");
        $exec3 = $prepare3->execute(array($idPage , $idChapitre , $numPage));

        
        //header("Location: ../index.php");





    }


}


Connexion::initConnexion();
$savePage = new SavePage();

$savePage->save();






?>