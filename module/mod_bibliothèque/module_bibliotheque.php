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
        $this->action = $_GET['action'] != null ? $_GET['action'] : "";
        if (isset($_GET['action'])) {

            switch ($this->action) {
                default:
                    $navBar = new ComposantNavBar();
                    $this->controleur->afficherLivre();
                    $footer = new Comp_Footer();
                    break;
            }
        }
    }
}
