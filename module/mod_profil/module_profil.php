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
                    if(isset($_POST['subAction'])){
                        $this->controleur->modifierNom();
                    }
                    else{
                        $this->controleur->afficherProfil();
                    }
                    break;
                case "modifierEmail":
                    if(isset($_POST['subAction'])){
                        $this->controleur->modifierEmail();
                    }
                    else{
                        $this->controleur->afficherProfil();
                    }
                    break;
                case "modifierMDP":
                    if(isset($_POST['subAction'])){
                        $this->controleur->modifierMDP();
                    }
                    else{
                        $this->controleur->afficherProfil();
                    }
                    break;
            }
        } else {
            $this->controleur->afficherProfil();
        }
    }
}