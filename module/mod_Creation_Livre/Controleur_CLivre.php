<?php
require_once('Modele_CLivre.php');
require_once('Vue_CLivre.php');
class Controleur_CLivre{
    private $modele;
    private $vue;

    public function __construct(){
        $this->modele = new Modele_CLivre();
        $this->vue = new Vue_CLivre();
        

    }

    public  function print_create_book()
    {
        if (isset($_SESSION['connected'])) {
            $this->vue->print_create_book();
        } else {
            header('Location: index.php?module=connexion&action=print_login');
        }
        
    }

    public function create_book()
    {
        if (isset($_SESSION['connected'])) {
            $this->modele->create_book();
        } else {
            header('Location: index.php?module=connexion&action=print_login');
        }
        
    }
    

  
   
}
?>