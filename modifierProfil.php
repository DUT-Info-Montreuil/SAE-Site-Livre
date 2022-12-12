<?php
session_start();
require_once("Connexion.php");
require_once("module/mod_profil/modele_profil.php");

class ModifierProfil extends Connexion
{
    private $modele;

    function action()
    {
        $this->modele = new modele_profil();
        $action = htmlspecialchars($_REQUEST['action']);
        if (isset($_SESSION['jeton'], $_SESSION['expiration_jeton']) && htmlspecialchars($_REQUEST['jeton']) === $_SESSION['jeton']) {
            if (time() < $_SESSION['expiration_jeton']) {
                switch ($action) {
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
        }
    }

    function changeNom()
    {
        $this->modele->changeNom(htmlspecialchars($_REQUEST['contenu']));
    }

    function changeEmail()
    {
        $this->modele->changeEmail(htmlspecialchars($_REQUEST['contenu']));
    }

    function changeMDP()
    {
        $this->modele->changeMDP(htmlspecialchars($_REQUEST['contenu']));
    }
}

Connexion::initConnexion();
$change = new ModifierProfil();
$change->action();
?>

