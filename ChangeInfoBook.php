<?php
require_once("Connexion.php");
class ChangeInfoBook extends Connexion {
    public function update(){
        $whatHaveChange = $_REQUEST['whatHaveChanged'];
        $idLivre = $_REQUEST['idLivre'];
        $idAuteur = $_REQUEST['idAuteur'];
        $story = $_REQUEST['story'];
        

        if ($whatHaveChange == "resumeLivre" || $whatHaveChange == "titre"){
            $arr = array($story , $idLivre , $idAuteur);
        $prepare = parent::$bdd->prepare("UPDATE Livre SET $whatHaveChange = ? WHERE id = ? AND IDAuteur = ?");
        $prepare->execute($arr);

        }else if ($whatHaveChange == "Chapitre"){
            $idChapitre = $_REQUEST['idChapitre'];
            $arr = array($story , $idChapitre , $idLivre );
            $prepare = parent::$bdd->prepare("UPDATE Chapitre SET titre = ? WHERE id = ? AND id_livre = ? ");
            $prepare->execute($arr);
        }
        
        



    }







}
Connexion::initConnexion();
$changeInfoBook = new ChangeInfoBook();
$changeInfoBook->update();



?>