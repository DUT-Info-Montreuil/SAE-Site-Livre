<?php
require_once("modele_bibliotheque.php");
require_once("vue_bibliotheque.php");
class Controleur_Biblio{
    private $modele;
    private $vue;
    public function __construct()
    {
        $this->modele = new Modele_Biblio();
        $this->vue = new Vue_Biblio();
        
    }
    public function afficherLivre(){
        $result = $this->modele->getLivre();
        $this->vue->afficherLivre($result);
    }

    

}
 


?>