<?php
require_once('Controleur_connexion.php');
class Module_connexion
{
    private $controleur;
    private $vue;
    private $action;
    public function __construct(){
        $this->controleur = new Controleur_connexion();
        $this->action = $_GET['action'] != null ? $_GET['action'] : "print_login";
        if(isset($_GET['action'])) {
            
            switch ($this->action) {
                case "print_login":
                    
                    $this->controleur->print_login();
                    break;
                case "print_signup":
                    $this->controleur->print_singup();
                    break;


                case "login" : 
                    $this->controleur->ExecLogin();
                    break;


                case "signup":
                    
                    $this->controleur->ExecSignup();
                    break;
                case "disconnect":
                    $this->controleur->Deco();
                    break;
                
            

            }
        }

    }


}


?>
