<?php
require_once("modele_Livre.php");
require_once("vue_Livre.php");
class Controleur_Livre
{
    private $modele;
    private $vue;
    public function __construct()
    {
        $this->modele = new Modele_Livre();
        $this->vue = new Vue_Livre();
    }

    public function affichageLivre()
    {
        if (isset($_GET['idLivre'])) {
            $livre = $this->modele->getLivre($_GET['idLivre']);
            $this->vue->afficherLivre($livre);
        }else{
            echo "erreur\n";
        }
        
        
    }
    public function affichageChapitre(){
        
            $chapitre = $this->modele->getChapitre($_GET['Chapitre'],$_GET['idLivre']);
            $this->modele->enregistreLivreLu($_GET['Chapitre'], $_GET['idLivre']);
            $pages = $this->modele->getPages($chapitre['id']);
            $allChap=$this->modele->getAllChap($_GET['idLivre']);
            $nbrchap=$this->modele->getNbrChapLivre($_GET['idLivre']);
            $this->vue->afficherChapitre($chapitre,$pages,$allChap,$nbrchap);
        
    }

}