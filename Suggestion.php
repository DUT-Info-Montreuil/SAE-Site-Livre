<?php
require_once('Connexion.php');
class Suggestion extends Connexion
{





    public function doSuggestion()
    {

        $idUser = $_REQUEST['idUser'];
        $idPage = $_REQUEST['idPage'];
        $commentaire = $_REQUEST['commentaire'];
        $modif = $_REQUEST['modif'];
        if ($idUser!=0){
            $this->addSuggestion($idPage, $idUser, $commentaire, $modif);
           
        }else{
            
        }
        
    }
    public function addSuggestion($idPage, $idUser, $commentaire, $modif)
    {
        
        $array =array($idPage, $idUser, $commentaire, $modif);
        $prepare = parent::$bdd->prepare("INSERT INTO Suggestion (id_page,id_user,commentaire,modification) VALUES (?, ?, ?, ?)");
        $exec = $prepare->execute($array);
        
        echo $array[0];
    }
}


Connexion::initConnexion();

$sugg = new Suggestion();

$sugg->doSuggestion();
?>