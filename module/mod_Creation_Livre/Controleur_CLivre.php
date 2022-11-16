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
            $result = $this->modele->get_genre();
            $this->vue->print_create_book($result);
        } else {
            header('Location: index.php?module=connexion&action=print_login');
        }
        
    }

    public function create_book()
    {
        if (isset($_SESSION['connected'])) {
            $result = $this->modele->create_book();
            if ($result != false){
                $this->modele->saveIMG($result);

                //header('Location: index.php');
            }
            header('Location: index.php?module=CLivre&action=print_write_book&idLivre='.$result);
           
        } else {
            header('Location: index.php?module=connexion&action=print_login');
        }
        
    }
    
    public function print_write_book()
    {   
        
        if (isset($_SESSION['connected'])&& isset($_GET['idLivre'])) {
            if ($this->modele->verifOwnerShip($_GET['idLivre'])) {
                $this->vue->write_book();
                echo" yes" ;
            }else{
                header('Location: index.php');
            }
            
        } else {
            header('Location: index.php?module=connexion&action=print_login');
        }
        
    }

  
   
}
?>