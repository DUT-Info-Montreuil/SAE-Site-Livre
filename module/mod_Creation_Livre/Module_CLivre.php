<?php
require_once('Controleur_CLivre.php');
class Module_CLivre
{
    private $controleur;
    private $vue;
    private $action;
    public function __construct(){
        $this->controleur = new Controleur_CLivre();
        $this->action = $_GET['action'] != null ? $_GET['action'] : "print_create_book";
        if(isset($_GET['action'])) {
            
            switch ($this->action) {
                case "print_create_book":
                    $this->controleur->print_create_book();
                    break;

                case "create_book":
                    $this->controleur->create_book();
                    break;                
            }
        }

    }


}


?>
