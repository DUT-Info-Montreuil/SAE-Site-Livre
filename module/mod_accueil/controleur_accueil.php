<?php
require_once("modele_accueil.php");
require_once("vue_accueil.php");
class Controleur_Accueil{
    private $modele;
    private $vue;
    public function __construct()
    {
        $this->modele = new Modele_Accueil();
        $this->vue = new Vue_Accueil();
    }

    public function AfficherCarrousel()
    {
        $this->vue->Carrousel();        
    }

}
 


?>