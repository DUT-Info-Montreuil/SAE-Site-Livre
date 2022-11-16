<?php
require_once("modele_parametre.php");
require_once("vue_parametre.php");
class Controleur_parametre{
    private $modele;
    private $vue;
    public function __construct()
    {
        $this->modele=new Modele_parametre();
        $this->vue=new Vue_parametre();
    }
    public function afficheParametre()
    {
        $this->vue->afficheParametre();
    }
    public function changerNom($nom)
    {
        $this->modele->changerNom($nom);
    }
    public function changerMail($mail)
    {
        $this->modele->changerMail($mail);
    }
    public function changerMdp($mdp)
    {
        $this->modele->changerMdp($mdp);
    }
}
