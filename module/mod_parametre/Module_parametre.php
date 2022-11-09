<?php
require_once("Controleur_parametre.php");
class Module_parametre{
    private $controleur;
    public function __construct()
    {
        $this->controleur=new Controleur_parametre();
        if(isset($_GET['action'])){
            switch($_GET['action']){
                case "afficheParametre":
                    $this->controleur->afficheParametre();
            }
        }
    }
}