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
     public function afficherProfil(){
         $this->modele->recupInfoAffichage();
         $this->vue->print_profil();
     }
 }


?>