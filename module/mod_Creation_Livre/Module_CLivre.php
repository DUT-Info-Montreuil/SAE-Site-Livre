<?php
require_once('Controleur_CLivre.php');
class Module_CLivre
{
    private $controleur;
    private $vue;
    private $action;
    public function __construct(){
        $navBar = new ComposantNavBar();
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
                case "print_write_book":
                    $this->controleur->print_write_book();
                    break ; 
                case "menu_write_book":
                    $this->controleur->menu_write_book();
                    break ;
                case "newPage":
                    $this->controleur->newPage();
                    break ;
                
                            }
        }
        $footer = new Comp_Footer();
    }


}
