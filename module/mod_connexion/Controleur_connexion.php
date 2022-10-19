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
       if (isset($_POST["identifiant"])){
        if ($this->modele->login()){
            $this->vue->Success("Bonjour ".$_SESSION["identifiant"]." vous êtes connecté");
           

       }else {
        $this->vue->Error("Identifiant ou mot de passe incorrect");
       }
    }
        

}

    public function ExecSignup(){
       
            if ($this->modele->signup()){
                echo"yes";
                $this->vue->Success("Inscription réussie");
               
            }
            else{
                $this->vue->Error("Inscription échouée");
            }

    }
    public function Deco(){
        $this->modele->deco();


    }
   
}
?>