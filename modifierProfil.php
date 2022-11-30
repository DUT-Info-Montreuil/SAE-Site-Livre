
<?php
    session_start();
    require_once("Connexion.php");
    require_once("module/mod_profil/modele_profil.php");
    class ModifierProfil extends Connexion {
        private $modele;
        function action(){
            $this->modele = new modele_profil();
            $action = $_REQUEST['action'];
            switch ($action){
                case 'changerNom':
                    $this->changeNom();
                    break;
                case 'changerEmail':
                    $this->changeEmail();
                    break;
                case 'changerMDP':
                    $this->changeMDP();
                    break;
            }
        }
        function changeNom(){
            $this->modele->changeNom($_REQUEST['contenu']);
        }
        function changeEmail(){
            $this->modele->changeEmail($_REQUEST['contenu']);
        }
        function changeMDP(){
            $this->modele->changeMDP($_REQUEST['contenu']);
        }
    }

    Connexion::initConnexion();
    $change = new ModifierProfil();
    $change->action();
?>

