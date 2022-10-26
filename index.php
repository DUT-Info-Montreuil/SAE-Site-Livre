<!DOCTYPE html>
<html lang="fr">
    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    </head>
    <body>
        
        
    </body>
</html>

<?php
    session_start(); 
    require_once("Connexion.php");
    require_once('module/mod_connexion/Module_connexion.php');
    require_once("vue_generique.php");
    Connexion::initConnexion();
    
    

    $vue_gen = new vueGenerique() ; 

    if (isset($_GET["module"])){
        switch($_GET["module"]){
            case "connexion" : 
                $mod_connexion = new Module_connexion();
            break ; 
           
        }
    }
    
    $result = $vue_gen->getAffichage();
    
    

    //echo $_SESSION["connected"] ; 
    //echo isset($_SESSION["connected"]);
    if (isset($_SESSION["connected"])){
        echo "<a href=\"index.php?action=disconnect&module=connexion\">".$_SESSION["identifiant"]."</a><br/>";
    }else{
        echo "<a href=\"index.php?action=print_login&module=connexion\">login</a><br/>";
    }
    echo "<a href=\"index.php?action=print_signup&module=connexion\">signup</a><br/>";
    echo "<a href=\"index.php?action=disconnect&module=connexion\">disconnect</a><br/>";
    echo $result ;  



?>