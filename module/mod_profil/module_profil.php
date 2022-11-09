<?php
require_once("controleur_profil.php");
class Module_profil{
    private $controleur;
    public function __construct()
    {
        $this->controleur = new Controleur_profil();
        if(isset($_GET['action'])){
            switch($_GET['action']){
                case "afficherProfil":
                    $this->controleur->afficherProfil();
                    break;
            }
        }
    }
}