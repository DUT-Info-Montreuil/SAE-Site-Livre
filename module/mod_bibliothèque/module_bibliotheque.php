<?php
require_once('controleur_bibliotheque.php');
class Module_Biblio
{
    private $controleur;
    private $vue;
    private $action;
    public function __construct()
    {
        $this->controleur = new Controleur_Biblio();
        $navBar = new ComposantNavBar();
        if (isset($_GET['action']) != false) {
            $this->action = $_GET['action'];
        } else {
            $_GET['action'] = "default";
            $this->action = $_GET['action'];
        }
        if (isset($_GET['action'])) {
            switch ($this->action) {
                case"bibliotheque":
                    $this->controleur->affichageBiblio();
                    break;
                case "default":                    
                    $this->controleur->affichageBiblio();
                    break;
            }
        }
        $footer = new Comp_Footer();
    }
}
