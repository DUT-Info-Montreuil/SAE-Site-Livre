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
            $this->modele->create_Default_page($result);
            //header('Location: index.php?module=CLivre&action=print_write_book&idLivre='.$result);
            $this->modele->verifOwnerShip($result);
            $idChapitre = $this->modele->getChapitre($result);
            $idPage = $this->modele->getPage($idChapitre[0]["id"]);
            $numPage = $idPage[0]["numeroPage"];
            echo $idChapitre[0]["id"] ;
            echo $idPage[0]["ID"] ;
            $this->vue->write_book($result ,$idChapitre[0]["id"] , $idPage[0]["ID"] ,$numPage,  " ") ;
           
        } else {
            header('Location: index.php?module=connexion&action=print_login');
        }
            
    }
    
    public function print_write_book()
    {   
        //localhost/~bpelletier/SAE-Site-Livre/index.php?module=CLivre&action=print_write_book&idLivre=1&idChapitre=1&idPage=&numPage=;
        if (isset($_SESSION['connected'])&& isset($_GET['idLivre'] ) && isset($_GET['idChapitre']) && isset($_GET['idPage']) && isset($_GET['numPage'])) {
            if ($this->modele->verifOwnerShip($_GET['idLivre'])) {
                $this->vue->write_book($_GET['idLivre'] , $_GET['idChapitre'],$_GET['idPage'] , $_GET['numPage'] , $this->modele->getStory($_GET['idLivre'] , $_GET['idPage'] )); // il faut chercher pour la page temp avant d'afficher la page officielle
            }else{
                header('Location: index.php');
            }
            
        } else {
            

            header('Location: index.php?module=connexion&action=print_login');
        }
        
    }
    public function menu_write_book(){
        if (isset($_SESSION['connected'])&& isset($_GET['idLivre'])) {
            if ($this->modele->verifOwnerShip($_GET['idLivre'])) {
               $result = $this->modele->getAllBookInfo($_GET['idLivre']);
               $this->vue->menu_write_book($result);
            }else{
                header('Location: index.php');
            }
            
        } else {
            header('Location: index.php?module=connexion&action=print_login');
        }





    }
    public function newPage(){
        if (isset($_SESSION['connected'])&& isset($_GET["idLivre"]) && isset($_GET['idChapitre'])) {
            if ($this->modele->verifOwnerShip($_GET['idLivre'])) {
                if($this->modele->newPage($_GET["idLivre"] ,  $_GET['idChapitre'] )== false){
                    $this->vue->Error("le chapitre precedent na pas de page ");
                    $this->vue->menu_write_book($this->modele->getAllBookInfo($_GET['idLivre']));
                }else {
                    $idChapitre = $this->modele->getChapitre($_GET['idLivre']);
                $idPage = $this->modele->getPage($idChapitre[0]["id"]);
                $numPage = $idPage[0]["numeroPage"];
                $this->vue->write_book($_GET['idLivre'] , $idChapitre[0]["id"] , $idPage[0]["ID"] , $numPage , "");
                }
                
            }else{
                header('Location: index.php');
            }
            
        } else {
            header('Location: index.php?module=connexion&action=print_login');
        }
    }

    public function delPage(){
        if (isset($_SESSION['connected'])&& isset($_GET["idLivre"]) && isset($_GET['idChapitre']) && isset($_GET['idPage'])) {
            if ($this->modele->verifOwnerShip($_GET['idLivre'])) {
                $this->modele->delPage($_GET["idLivre"] ,  $_GET['idChapitre'] , $_GET['idPage'] , 1);
               $this->vue->menu_write_book($this->modele->getAllBookInfo($_GET['idLivre']));
               
            
            }else{
                header('Location: index.php');
            }
            
        } else {
            header('Location: index.php?module=connexion&action=print_login');
        }




    }


    public function newChapitre(){
        if (isset($_SESSION['connected'])&& isset($_GET["idLivre"])) {
            if ($this->modele->verifOwnerShip($_GET['idLivre'])) {
                $this->modele->newChapitre($_GET["idLivre"]);
                $this->vue->menu_write_book($this->modele->getAllBookInfo($_GET['idLivre']));
            }else{
                header('Location: index.php');
            }
            
        } else {
            header('Location: index.php?module=connexion&action=print_login');
        }


    }


    public function delChapitre() {
        if (isset($_SESSION['connected'])&& isset($_GET["idLivre"]) && isset($_GET['idChapitre'])) {
            if ($this->modele->verifOwnerShip($_GET['idLivre'])) {
                $this->modele->delChapitre($_GET["idLivre"] ,  $_GET['idChapitre']);
                $this->vue->menu_write_book($this->modele->getAllBookInfo($_GET['idLivre']));
            }else{
                header('Location: index.php');
            }
            
        } else {
            header('Location: index.php?module=connexion&action=print_login');
        }



    }

}
?>