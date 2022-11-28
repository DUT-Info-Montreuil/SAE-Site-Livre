<?php
require_once('Connexion.php');

class Like extends Connexion{


    public function isUserLikedThisBook($idUser,$idLivre){
        $sql = "SELECT count(*) FROM LikedBook where idLivre = $idLivre and idUser = $idUser;";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetch();
        return $result;
    }

    
public function doLike(){
    $idLivre = $_REQUEST['idLivre'];
    $idUser = $_REQUEST['idUser'];
    if($idUser!=0){
       
        echo $this->isUserLikedThisBook($idUser,$idLivre)[0];
        if($this->isUserLikedThisBook($idUser,$idLivre)[0]==0){
          
            $this->addLike($idLivre,$idUser);
    }
    elseif($this->isUserLikedThisBook($idUser,$idLivre)[0]==1){
        echo "You already liked this book";
        $this->removeLike($idLivre,$idUser);
    }else{
        
    }

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

}
Connexion::initConnexion();
$like = new Like();
$like->doLike();
?>