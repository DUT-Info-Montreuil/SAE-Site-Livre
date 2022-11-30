<?php

require_once('Connexion.php');
class vue extends Connexion{
    public function doVue(){
        $idLivre = $_REQUEST['idLivre'];
        $idUser = $_REQUEST['idUser'];
        echo $this->isUserAlreadyViewedThisBook($idUser,$idLivre)[0];
        if($idUser!=0){
            $this->addVue($idLivre,$idUser);
        }
        header("Location: index.php?module=livre&idLivre=$idLivre&Chapitre=1");
        
    }
    public function isUserAlreadyViewedThisBook($idUser,$idLivre){
        $sql = "SELECT count(*) FROM ViewedBook where idLivre = $idLivre and idUser = $idUser;";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetch();
        return $result;
    }
    public function addVue($idLivre,$idUser){
        if($this->isUserAlreadyViewedThisBook($idUser,$idLivre)[0]==0){
            $sql = "UPDATE `Livre` SET `nbrVue` = nbrVue+1 WHERE Livre.id = $idLivre;";
            $prepare = parent::$bdd->prepare($sql);
            $exec = $prepare->execute();
    
            $sql2 = "INSERT INTO `ViewedBook` (`idLivre`, `idUser`) VALUES ($idLivre, $idUser);";
            $prepare2 = parent::$bdd->prepare($sql2);
            $exec2 = $prepare2->execute();
            
        }
    }
}

Connexion::initConnexion();
$vue = new vue();
$vue->doVue();

?>