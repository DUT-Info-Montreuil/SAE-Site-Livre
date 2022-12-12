<?php
require_once('Connexion.php');
require_once('module/mod_Livre/modele_Livre.php');

class Like extends Connexion{


    

    
public function doLike(){
    header(('Content-Type: application/json'));
    $modLivre=new Modele_Livre();
    $idLivre = $_REQUEST['idLivre'];
    $idUser = $_REQUEST['idUser'];
    if($idUser!=0){
    
        if($modLivre->isUserLikedThisBook($idUser,$idLivre)[0]==0){
            
            $this->addLike($idLivre,$idUser);
            $liked=1;
    }
    elseif($modLivre->isUserLikedThisBook($idUser,$idLivre)[0]==1){
        
        $this->removeLike($idLivre,$idUser);
        $liked=0;
    }else{
        
    }
    $tabReturn = array("compteur"=>$this->getNbrLike($idLivre)[0],"liked"=>$liked);
    echo json_encode($tabReturn);
    
   
   
}

}
public function addLike($idLivre,$idUser){
        $sql = "UPDATE `Livre` SET `nbrLike` = nbrLike+1 WHERE Livre.id = $idLivre;";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();

        $sql2 = "INSERT INTO `LikedBook` (`idLivre`, `idUser`) VALUES ($idLivre, $idUser);";
        $prepare2 = parent::$bdd->prepare($sql2);
        $exec2 = $prepare2->execute();
        
}
public function removeLike($idLivre,$idUser){
    $sql = "UPDATE `Livre` SET `nbrLike` = nbrLike-1 WHERE Livre.id = $idLivre;";
    $prepare = parent::$bdd->prepare($sql);
    $exec = $prepare->execute();

    $sql2 = "DELETE FROM `LikedBook` WHERE `LikedBook`.`idLivre` = $idLivre and `LikedBook`.`idUser` = $idUser;";
    $prepare2 = parent::$bdd->prepare($sql2);
    $exec2 = $prepare2->execute();
    
}

public function getNbrLike($idLivre){
    $sql = "SELECT nbrLike FROM Livre where id = $idLivre;";
    $prepare = parent::$bdd->prepare($sql);
    $exec = $prepare->execute();
    $result = $prepare->fetch();
    return $result;
}

}
Connexion::initConnexion();

$like = new Like();

$like->doLike();
?>