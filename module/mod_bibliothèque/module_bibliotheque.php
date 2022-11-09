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
        if (isset($_GET['action']) != false) {
            $this->action = $_GET['action'];
        } else {
            $_GET['action'] = "default";
        }
        if (isset($_GET['action'])) {
            switch ($this->action) {
                case "default":
                    $navBar = new ComposantNavBar();
                    $this->controleur->afficherLivre();
                    $footer = new Comp_Footer();
                    break;
            }
        }
    }
}
