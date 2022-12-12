<?php
require_once("vue_navBar.php");
require_once("modele_navBar.php");
class ControleurNavBar{
    private $vue;
    private $modele;
    public function __construct()
    {
        $this->vue = new VueNavBar();
        $this->modele = new ModeleNavBar();
    }
    public function afficheNavBar(){
        $livres = $this->modele->getLivres();
        $this->vue->printnavBar($livres);
    }
}