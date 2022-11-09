<?php
require_once('Connexion.php');
require_once('FonctionUtile.php');
class Modele_CLivre extends Connexion {
    public function __construct(){

    }
    public function create_book(){
    
       $arr = array($_POST["title"] , $_POST["resume"] , $_SESSION["id"]);
        $prepare = parent::$bdd->prepare("INSERT into Livre ( titre, resumeLivre, IDAuteur) VALUES(?,?,?)");
        $exec = $prepare->execute($arr);
        if ($exec){
            
        foreach ($_SESSION["genre"] as $genre) {
           
            
            if (isset($_POST["Genre".$genre["id"]])){
                
                $lastBook = FonctionUtile::getLastBook();
                
                    
                    $arr2 = array($lastBook["id"], $genre["id"] );
                    $prepare2 = parent::$bdd->prepare("INSERT into LivreGenre ( idLivre, idGenre) VALUES(?,?)");
                    $exec2 = $prepare2->execute($arr2);

                    if ($exec2){
                        echo "ok";
                    }else{
                        echo "pas ok";
                    }

                
            }

        }

            //unset($_SESSION["genre"]);
            return true ;
        }else {
            //unset($_SESSION["genre"]);
            return false ;
        }
    }
    

    public function get_genre(){
        $prepare = parent::$bdd->prepare("SELECT * FROM Genre where id >1");
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        $_SESSION["genre"] = $result;
        return $result;
    }
   
    
    
}

?>
