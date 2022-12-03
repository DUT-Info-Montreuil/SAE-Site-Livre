<?php
require_once("controleur_profil.php");

class Module_profil
{
    private $controleur;

    public function __construct()
    {
        $this->controleur = new Controleur_profil();
        $navBar = new ComposantNavBar();
        if(!isset($_SESSION["id"])){
            header("Location: index.php?module=connexion&action=print_login");
        }
        elseif (isset($_GET['id'])){
            if(htmlspecialchars($_GET['id']) == $_SESSION['id']){
                $this->controleur->afficherMonProfil();
            }
            else{
                $this->controleur->afficherAutreProfil();
            }
        }
        else{
            $this->controleur->afficherMonProfil();
        }
        $footer = new Comp_Footer();
    }
}