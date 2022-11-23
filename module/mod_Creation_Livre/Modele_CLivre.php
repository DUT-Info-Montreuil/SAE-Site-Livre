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
           
            $allNull = true ; 
            if (isset($_POST["Genre".$genre["id"]])){
                $allNull = false ;
                $lastBook = FonctionUtile::getLastBook();
                
                    
                    $arr2 = array($lastBook["id"], $genre["id"] );
                    $prepare2 = parent::$bdd->prepare("INSERT into LivreGenre ( idLivre, idGenre) VALUES(?,?)");
                    $exec2 = $prepare2->execute($arr2);

                    

                
            }

        }
        if ($allNull){
            $lastBook = FonctionUtile::getLastBook();
            $arr2 = array($lastBook["id"], 1 );
            $prepare2 = parent::$bdd->prepare("INSERT into LivreGenre ( idLivre, idGenre) VALUES(?,?)");
            $exec2 = $prepare2->execute($arr2);

        }

            //unset($_SESSION["genre"]);
            return $lastBook["id"] ;
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

    public function saveIMG($id){
        if (!isset($_GET["img"])){
            return ; 
        }
        
        //Stores the filename as it was on the client computer.
        $imagename = $_FILES['img']['name'];
        //Stores the filetype e.g image/jpeg
        $imagetype = $_FILES['img']['type'];
        //Stores any error codes from the upload.
        $imageerror = $_FILES['img']['error'];
        //Stores the tempname as it is given by the host when uploaded.
        $imagetemp = $_FILES['img']['tmp_name'];
    
        //The path you wish to upload the image to
        $imagePath = "ressource/bookCover/";
    
        if(is_uploaded_file($imagetemp)) {
            if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
                echo "Sussecfully uploaded your image.";
                rename("ressource/bookCover/".$imagename , "ressource/bookCover/".$id.".jpg");
            }
            else {
                echo "Failed to move your image.";
            }
        }
        else {
            echo "Failed to upload your image.";
        }



    }
   
    public function verifOwnerShip($idLivre){
        $arr = array($idLivre , $_SESSION["id"]);
        $prepare = parent::$bdd->prepare("SELECT * FROM Livre where id = ? and IDAuteur = ?");
        $exec = $prepare->execute($arr);
        $result = $prepare->fetchAll();
        if (count($result) > 0){
            return true ;
        }else {
            return false ;
        }


    }

    public function create_Default_page($idLivre){
        $arr = array("defaultName" , 1 , $idLivre);
        
        $prepare = parent::$bdd->prepare("INSERT into Chapitre ( titre, numeroChap , id_livre) VALUES(?,?,?);");
        $exec = $prepare->execute($arr);
        $prepare2 = parent::$bdd->prepare("SELECT id FROM Chapitre where  id_livre = ?;");
        $exec2 = $prepare2->execute(array($idLivre));
        $result = $prepare2->fetchAll();
        $arr2 = array(1 , " " ,$result[0]["id"]);
        $prepare3 = parent::$bdd->prepare("INSERT into Page ( numeroPage, TexteDeLaPage, id_chapitre) VALUES(?,?,?);");
        $exec3 = $prepare3->execute($arr2);
        
        
    }   


    public function getStory($idChapitre, $idPage){
        $arr = array($idChapitre , $idPage);
        $prepare = parent::$bdd->prepare("SELECT TexteDeLaPage FROM Page where id_Chapitre = ? and id = ?");
        $exec = $prepare->execute($arr);
        $result = $prepare->fetch();
        return $result[0];
    }


    public function getChapitre($idLivre){
        $arr = array($idLivre);
        $prepare = parent::$bdd->prepare("SELECT * FROM Chapitre where id_livre = ?");
        $exec = $prepare->execute($arr);
        $result = $prepare->fetchAll();
        return $result;
    }

    public function getPage($idChapitre){
        $arr = array($idChapitre);
        $prepare = parent::$bdd->prepare("SELECT * FROM Page where id_chapitre = ?");
        $exec = $prepare->execute($arr);
        $result = $prepare->fetchAll();
        return $result;
    }


    
    




    
}   

?>
