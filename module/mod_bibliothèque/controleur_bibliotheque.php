<?php
require_once("modele_bibliotheque.php");
require_once("vue_bibliotheque.php");
class Controleur_Biblio
{
    private $modele;
    private $vue;
    public function __construct()
    {
        $this->modele = new Modele_Biblio();
        $this->vue = new Vue_Biblio();
    }
    public function affichageBiblio()
    {
        $livre = $this->modele->getLivres();
        $genre = $this->modele->getGenres();
        $this->vue->afficherBiblio($livre, $genre);

    }

    public function lectureLivre()
    {
        
    }
}



?>