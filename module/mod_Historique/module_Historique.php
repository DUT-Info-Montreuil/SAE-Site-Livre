<?php
require_once("controleur_Historique.php");
class Module_Historique {
    private $controleur;
    public function __construct()
    {
        $this->controleur = new Controleur_Historique();
        $navBar = new ComposantNavBar();
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case "historiqueLecture":
                    $this->controleur->affichageHistoriqueLecture();
                    break;
                case "historiqueEcriture":
                    $this->controleur->affichageHistoriqueEcriture();
                    break;
            }
        }
        else {
            $this->controleur->affichageHistoriqueLecture();
        }
        $footer = new Comp_Footer();
    }
}