<?php
include_once('Connexion.php');

class SavePage extends Connexion{
    public function save(){
        $idChapitre = $_REQUEST["idChapitre"];
        $idAuteur = $_REQUEST["idAuteur"];
        $story = $_REQUEST["story"];
        $numPage = $_REQUEST["numPage"];
        $idPage = $_REQUEST["idPage"];
        $save = $_REQUEST["save"];
        if ($save == "true"){
            $prepare = parent::$bdd->prepare("SELECT * FROM TempSave WHERE idPage = ? AND id_chapitre = ?  ;");
        $exec = $prepare->execute(array($idPage , $idChapitre ));
        $result = $prepare->fetchAll();
        
        $prepare2 = parent::$bdd->prepare("UPDATE Page SET TexteDeLaPage = ? WHERE ID = ? ;");
        $exec2 = $prepare2->execute(array($result[0]["TexteDeLaPage"] , $idPage));
        }
        

        $prepare3 = parent::$bdd->prepare("DELETE FROM TempSave WHERE idPage = ? AND id_chapitre = ?  ;");
        $exec3 = $prepare3->execute(array($idPage , $idChapitre ));

        
        //header("Location: ../index.php");





    }


}


Connexion::initConnexion();
$savePage = new SavePage();

$savePage->save();






?>