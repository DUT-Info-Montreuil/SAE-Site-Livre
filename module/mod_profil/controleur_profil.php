<?php
require_once("modele_profil.php");
require_once("vue_profil.php");

 class controleur_profil{
     private $modele;
     private $vue;
     public function __construct(){
         $this->modele = new Modele_profil();
         $this->vue = new Vue_profil();
     }
     public function afficherMonProfil(){
         $MeslivresLus = $this->modele->getLivresLu();
         $this->vue->print_monprofil($MeslivresLus);
     }

     public function afficherAutreProfil(){
         if($this->modele->verifExiste()){
             $autreEmail = $this->modele->getAutreEmail();
             $autreNom = $this->modele->getAutreNom();
             $this->vue->print_autreProfil($autreEmail, $autreNom);
         }
         else {
             $this->afficherMonProfil();
         }

     }
     /*public function modifierNom(){
         $this->modele->changeNom();
         $this->vue->print_profil($this->livresLus);
     }
     public function modifierEmail(){
         $this->modele->changeEmail();
         $this->vue->print_profil($this->livresLus);
     }
     public function modifierMDP(){
         $this->modele->changeMDP();
         $this->vue->print_profil($this->livresLus);
     }*/
 }


?>