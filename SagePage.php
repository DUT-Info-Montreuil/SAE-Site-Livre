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
        
        $prepare2 = parent::$bdd->prepare("UPDATE PAGE SET TexteDeLaPage = ? WHERE id = ? ;");
        $exec2 = $prepare2->execute(array($result[0]["TexteDeLaPage"] , $idPage));

        $prepare3 = parent::$bdd->prepare("DELETE FROM TempSave WHERE idPage = ? AND id_chapitre = ? AND numeroPage = ? ;");
        $exec3 = $prepare3->execute(array($idPage , $idChapitre , $numPage));

        ?>
        <script>
            alert("YEEEEEEEEEEEEEEEE");
        </script>
        <?php
        //header("Location: ../index.php");





    }


}


Connexion::initConnexion();
$savePage = new SavePage();

$savePage->save();






?>