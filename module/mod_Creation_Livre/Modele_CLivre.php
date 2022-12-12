<?php
require_once('Connexion.php');
require_once('FonctionUtile.php');
class Modele_CLivre extends Connexion
{
    public function __construct()
    {
    }
    public function create_book()
    {

        $prepareVerif = parent::$bdd->prepare("SELECT * FROM Livre WHERE Titre = ? AND IDAuteur = ?;");
        $execVerif = $prepareVerif->execute(array($_REQUEST["title"], $_SESSION["id"]));
        $resultVerif = $prepareVerif->fetchAll();
        if ($resultVerif == null || $execVerif == false) {



            $arr = array($_POST["title"], $_POST["resume"], $_SESSION["id"]);
            $prepare = parent::$bdd->prepare("INSERT into Livre ( titre, resumeLivre, IDAuteur) VALUES(?,?,?)");
            $exec = $prepare->execute($arr);
            if ($exec) {
                $allNull = true;
                foreach ($_SESSION["genre"] as $genre) {


                    if (isset($_POST["Genre" . $genre["id"]])) {
                        $allNull = false;
                        $lastBook = FonctionUtile::getLastBook();


                        $arr2 = array($lastBook["id"], $genre["id"]);
                        $prepare2 = parent::$bdd->prepare("INSERT into LivreGenre ( idLivre, idGenre) VALUES(?,?)");
                        $exec2 = $prepare2->execute($arr2);
                    }
                }
                if ($allNull) {
                    $lastBook = FonctionUtile::getLastBook();
                    $arr2 = array($lastBook["id"], 1);
                    $prepare2 = parent::$bdd->prepare("INSERT into LivreGenre ( idLivre, idGenre) VALUES(?,?)");
                    $exec2 = $prepare2->execute($arr2);
                }

                //unset($_SESSION["genre"]);
                return $lastBook["id"];
            } else {
                //unset($_SESSION["genre"]);
                return false;
            }
        }
        return $resultVerif[0]["id"];
    }


    public function get_genre()
    {
        $prepare = parent::$bdd->prepare("SELECT * FROM Genre where id >1");
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        $_SESSION["genre"] = $result;
        return $result;
    }

    public function saveIMG($id)
    {
        $target_dir = "ressource/bookCover/";
        $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
        $target_file = $target_dir .$id.".".$imageFileType;
        $uploadOk = 1;
        

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
           $imageFileType != "png"
        ) {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }


















        /*if (!isset($_GET["img"])){
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
        }*/
    }

    public function verifOwnerShip($idLivre)
    {
        $arr = array($idLivre, $_SESSION["id"]);
        $prepare = parent::$bdd->prepare("SELECT * FROM Livre where id = ? and IDAuteur = ?");
        $exec = $prepare->execute($arr);
        $result = $prepare->fetchAll();
        if (count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function create_Default_page($idLivre)
    {
        $arr = array("defaultName", 1, $idLivre);

        $prepare = parent::$bdd->prepare("INSERT into Chapitre ( titre, numeroChap , id_livre) VALUES(?,?,?);");
        $exec = $prepare->execute($arr);
        $prepare2 = parent::$bdd->prepare("SELECT id FROM Chapitre where  id_livre = ?;");
        $exec2 = $prepare2->execute(array($idLivre));
        $result = $prepare2->fetchAll();
        $arr2 = array(1, " ", $result[0]["id"]);
        $prepare3 = parent::$bdd->prepare("INSERT into Page ( numeroPage, TexteDeLaPage, id_chapitre) VALUES(?,?,?);");
        $exec3 = $prepare3->execute($arr2);
    }


    public function getStory($idChapitre, $idPage)
    {
        $arr = array($idChapitre, $idPage);
        $prepareTemp = parent::$bdd->prepare("SELECT TexteDeLaPage FROM TempSave where id_chapitre = ? and idPage = ?;");
        $execTemp = $prepareTemp->execute($arr);
        $resultTemp = $prepareTemp->fetch();
        if ($resultTemp != false) {
            if ($resultTemp["TexteDeLaPage"] != "") {
                return $resultTemp["TexteDeLaPage"];
            }
        }

        $prepare = parent::$bdd->prepare("SELECT TexteDeLaPage FROM Page where id_Chapitre = ? and ID = ?");
        $exec = $prepare->execute($arr);
        $result = $prepare->fetch();
        if ($result == false) {
            return "";
        }

        return $result["TexteDeLaPage"];
    }


    public function getChapitre($idLivre)
    {
        $arr = array($idLivre);
        $prepare = parent::$bdd->prepare("SELECT * FROM Chapitre where id_livre = ? ORDER BY numeroChap DESC");
        $exec = $prepare->execute($arr);
        $result = $prepare->fetchAll();
        return $result;
    }

    public function getPage($idChapitre)
    {
        $arr = array($idChapitre);
        $prepare = parent::$bdd->prepare("SELECT * FROM Page where id_chapitre = ? order by numeroPage DESC");
        $exec = $prepare->execute($arr);
        $result = $prepare->fetchAll();
        return $result;
    }

    public function getAllBookInfo($idLivre)
    {
        $arr = array($idLivre);
        $prepare = parent::$bdd->prepare("SELECT * FROM Livre where id = ?");
        $exec = $prepare->execute($arr);
        $result = $prepare->fetchall();
        $trueResult[0] = $result;
        $prepare2 = parent::$bdd->prepare("SELECT * FROM Chapitre where id_livre = ?");
        $exec2 = $prepare2->execute($arr);
        $result2 = $prepare2->fetchAll();
        $trueResult[1] = $result2;
        for ($i = 0; $i < count($result2); $i++) {
            $arr2 = array($result2[$i]["id"]);
            $prepare3 = parent::$bdd->prepare("SELECT * FROM Page where id_chapitre = ? ORDER BY numeroPage ASC");
            $exec3 = $prepare3->execute($arr2);
            $result3 = $prepare3->fetchAll();
            $trueResult[2][$i] = $result3;
        }

        return $trueResult;
    }




    public function changePageNumber($idLivre, $lim, $action)
    {
        $allBookInfo = $this->getAllBookInfo($idLivre);
        for ($i = 0; $i < count($allBookInfo[1]); $i++) {
            for ($j = 0; $j < count($allBookInfo[2][$i]); $j++) {
                if ($allBookInfo[2][$i][$j]["numeroPage"] > $lim) {

                    $arr = array($allBookInfo[2][$i][$j]["numeroPage"] + $action, $allBookInfo[2][$i][$j]["ID"]);
                    $prepare = parent::$bdd->prepare("UPDATE Page SET numeroPage = ? where id = ?");
                    $exec = $prepare->execute($arr);
                }
            }
        }
    }



    public function newPage($idLivre, $idChapitre)
    {
        echo $idLivre;
        echo $idChapitre;
        $arr = array($idChapitre);
        $prepare = parent::$bdd->prepare("SELECT * FROM Page where id_chapitre = ?");
        $exec = $prepare->execute($arr);
        $result = $prepare->fetchAll();
        if (!empty($result)) {
            $lim = $result[count($result) - 1]["numeroPage"];
            $this->changePageNumber($idLivre, $lim, 1);
            $arr2 = array($idChapitre, $lim + 1, "");
            $prepare2 = parent::$bdd->prepare("INSERT into Page (id_chapitre , numeroPage , TexteDeLaPage) VALUES(?,?,?);");
            $exec2 = $prepare2->execute($arr2);
            if ($exec2 == true) {
                return true;
            } else {
                echo "erreur";
                return false;
            }
        } else {
            $arr = array($idChapitre);
            echo $idChapitre;
            $prepare = parent::$bdd->prepare("SELECT * FROM Chapitre where id = ?");
            $exec = $prepare->execute($arr);
            $result = $prepare->fetch();
            $arr3 = array($result["numeroChap"] - 1, $idLivre);
            $prepare3 = parent::$bdd->prepare("SELECT * FROM Chapitre where numeroChap = ? and id_livre = ?");
            $exec3 = $prepare3->execute($arr3);
            $result3 = $prepare3->fetch();
            echo $result3["id"];
            $arr4 = array($result3["id"]);
            $prepare4 = parent::$bdd->prepare("SELECT * FROM Page where id_chapitre = ?");
            $exec4 = $prepare4->execute($arr4);
            $result4 = $prepare4->fetchAll();
            echo count($result4);
            if (empty($result4)) {
                echo "empty";
                return false;
            }
            $lim = $result4[count($result4) - 1]["numeroPage"];
            $this->changePageNumber($idLivre, $lim, "up");
            $arr2 = array($idChapitre, $lim + 1, "");
            $prepare2 = parent::$bdd->prepare("INSERT into Page (id_chapitre , numeroPage , TexteDeLaPage) VALUES(?,?,?);");
            $exec2 = $prepare2->execute($arr2);
            if ($exec2 == true) {
                return true;
            } else {
                echo "false";
                return false;
            }
        }
    }



    public function delPage($idLivre, $idChapitre, $idPage, $numberOfDel)
    {
        $arr = array($idChapitre, $idPage);
        $prepare = parent::$bdd->prepare("SELECT * FROM Page where id_chapitre = ? AND ID= ?");
        $exec = $prepare->execute($arr);
        $result = $prepare->fetchAll();
        if (!empty($result)) {
            $lim = $result[count($result) - 1]["numeroPage"];



            $this->changePageNumber($idLivre, $lim,  -$numberOfDel);
            $arr2 = array($idPage);
            $prepare2 = parent::$bdd->prepare("DELETE FROM Page where ID = ?");
            $exec2 = $prepare2->execute($arr2);
            $prepare3 = parent::$bdd->prepare("DELETE FROM TempSave where idPage = ?");
            $exec3 = $prepare2->execute($arr2);

            if ($exec2 == true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function newChapitre($idLivre)
    {
        $arr = array($idLivre);
        $prepare = parent::$bdd->prepare("SELECT * FROM Chapitre where id_livre = ?");
        $exec = $prepare->execute($arr);
        $result = $prepare->fetchAll();
        $lim = $result[count($result) - 1]["numeroChap"];
        $arr2 = array($idLivre, $lim + 1, "default name");
        $prepare2 = parent::$bdd->prepare("INSERT into Chapitre (id_livre , numeroChap , titre) VALUES(?,?,?);");
        $exec2 = $prepare2->execute($arr2);
        if ($exec2 == true) {
            return true;
        } else {
            return false;
        }
    }


    public function delChapitre($idLivre, $idChapitre)
    {
        $allBookInfo = $this->getAllBookInfo($idLivre);
        $arr = array($idLivre, $idChapitre);
        $prepare = parent::$bdd->prepare("SELECT * FROM Chapitre where id_livre = ? and id = ?");
        $exec = $prepare->execute($arr);
        $result = $prepare->fetchAll();
        $lim = $result[0]["numeroChap"];
        $prepare = parent::$bdd->prepare("SELECT * FROM Page where id_chapitre = ?");
        $exec = $prepare->execute(array($idChapitre));
        $result = $prepare->fetchAll();
        $count = count($result);
        for ($i = 0; $i < count($result); $i++) {
            $this->delPage($idLivre, $idChapitre, $result[$i]["ID"], $count);
        }
        $arr2 = array($idChapitre);
        $prepare2 = parent::$bdd->prepare("DELETE FROM Chapitre where id = ?");
        $exec2 = $prepare2->execute($arr2);
        if ($exec2 == true) {
            return true;
        } else {
            return false;
        }
    }
}
