<?php
require_once("modele_Historique.php");
require_once("vue_Historique.php");
class Controleur_Historique
{
    private $modele;
    private $vue;
    public function __construct()
    {
        $this->modele = new Modele_Historique();
        $this->vue = new Vue_Historique();
    }
    public function affichageHistoriqueLecture()
    {
        $historiqueLecture = $this->modele->getHistoriqueLecture();
        $this->vue->afficherHistoriqueLecture($historiqueLecture);
    }
    public function affichageHistoriqueEcriture()
    {

    }
}
