<?php
require_once("controleur_navBar.php");
class ComposantNavBar{
    private $controleur;
    public function __construct()
    {
        $this->controleur=new ControleurNavBar();
        $this->controleur->afficheNavBar();
    }
}