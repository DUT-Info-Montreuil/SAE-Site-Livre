<?php
require_once('Modele_connexion.php');
require_once('Vue_connexion.php');
class Controleur_connexion{
    private $modele;
    private $vue;

    public function __construct(){
        $this->modele = new Modele_Connexion();
        $this->vue = new Vue_Connexion();
        

    }

    public  function print_login()
    {
        $this->vue->login();
    }
    public  function print_singup()
    {
        $this->vue->signup();
    }

    public function ExecLogin(){
        if (isset($_SESSION["connected"])){
            header("Location: index.php?module=accueil");
            return ;
        }


       if (isset($_POST["identifiant"])){
        if ($this->modele->login()){
            $this->vue->Success("Bonjour ".$_SESSION["identifiant"]." vous êtes connecté");
            header("Location: index.php?module=accueil");

       }else {
        
        header("Location: index.php?module=connexion&action=print_login");
        $this->vue->Error("Identifiant ou mot de passe incorrect");
        

       }
    }
        

}

    public function ExecSignup(){
       
            if ($this->modele->signup()){
                
                $this->vue->Success("Inscription réussie");
                header("Location: index.php?module=connexion&action=print_login");
               
            }
            else{
                header("Location: index.php?module=connexion&action=print_signup");
                $this->vue->Error("Inscription échouée");
            }

    }
    public function Deco(){
        $this->modele->deco();
        header("Location: index.php?module=accueil");

    }
   
}
?>