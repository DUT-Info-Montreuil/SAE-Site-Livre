<?php
require_once("controleur_accueil.php");
class Module_Accueil{
    private $controleur;
    private $vue;
    public function __construct()
    {
        $this->controleur = new Controleur_Accueil();
        $this->vue = new Vue_Accueil();
        $navBar = new ComposantNavBar();
        $this->controleur->AfficherCarrousel();
        $footer = new Comp_Footer();
    }
}

?>