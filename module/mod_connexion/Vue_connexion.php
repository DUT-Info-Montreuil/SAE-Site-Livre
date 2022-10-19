<?php
require_once("vue_generique.php");
class Vue_connexion extends vueGenerique{
    public function __construct()
    {
        parent::__construct();
    }

    
    public function form_ajout(){

    }
    
    public function login()
    {
        echo "login";
        ?>
        <html>


            <form class=ConnexionForm method="post" action="index.php?action=login&module=connexion">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adresse Mail</label>
                <input name=identifiant type="" class="form-control"  aria-describedby="emailHelp" placeholder="name@example.com">
                <div  class="form-text">On partage pas :> </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de Passe</label>
                <input name=pwd type="password" class="form-control" placeholder="mot de passe">
            </div>
            
            <button type="submit" class="btn btn-primary">GO</button>
            </form>



            <!--<form method="post" action="index.php?action=login&module=connexion">
            <input type="text" name="identifiant" ></input>
            <input type="text" name="mdp" ></input>
            <input type="submit"></input>

            </form>-->
            
        </html>

        <?php


    }

    public function signup()
    {
        
        ?>
        <html>


        <form class=ConnexionForm method="post" action="index.php?action=signup&module=connexion">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adresse Mail</label>
                <input name=mail type="email" class="form-control"  aria-describedby="emailHelp" placeholder="name@example.com">
                <div  class="form-text">On partage pas :> </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Identifiant</label>
                <input name=identifiant type="" class="form-control"  aria-describedby="emailHelp" placeholder="user541247">
                <div  class="form-text">On partage pas :> </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de Passe</label>
                <input name=pwd type="password" class="form-control" placeholder="mot de passe">
            </div>
            
            <button type="submit" class="btn btn-primary">GO</button>
        </form>



           <!-- <form method="post" action="index.php?action=signup&module=connexion">
            <input type="text" name="identifiant" ></input>
            <input type="text" name="mdp" ></input>
            <input type="submit"></input>

            </form>-->
            
        </html>

        <?php

    }

    
}



?>
