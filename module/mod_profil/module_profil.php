<?php
require_once("controleur_profil.php");

class Module_profil
{
    private $controleur;

    public function __construct()
    {
        $this->controleur = new Controleur_profil();
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case "afficherProfil":
                    $this->controleur->afficherProfil();
                    break;
                case "modifierNom":
                    $this->controleur->modifierNom();
                    break;
                case "modifierEmail":
                    $this->controleur->modifierEmail();
                    break;
                case "modifierMDP":
                    $this->controleur->modifierMDP();
                    break;
            }
        } else {
            $this->controleur->afficherProfil();
        }
    }
}