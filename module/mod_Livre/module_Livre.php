<?php
require_once('controleur_Livre.php');
class Module_Livre
{
    private $controleur;
    private $vue;
    private $action;
    public function __construct()
    {
        $this->controleur = new Controleur_Livre();
        $navBar = new ComposantNavBar();
        if (isset($_GET['action']) != false) {
            $this->action = $_GET['action'];
        } else {
            $_GET['action'] = "default";
            $this->action = $_GET['action'];
        }
        if (isset($_GET['action'])) {
            switch ($this->action) {
                case "default":        
                    if (isset($_GET['Chapitre'])) {
                        $this->controleur->affichageChapitre();
                        
                    } else {
                        $this->controleur->affichageLivre();
                       
                    }            
                    
                    break;
            }
        }
        $footer = new Comp_Footer();
    }
}
