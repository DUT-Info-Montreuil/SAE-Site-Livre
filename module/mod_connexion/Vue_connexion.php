<?php
require_once("vue_generique.php");
class Vue_connexion extends vueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }


    public function form_ajout()
    {
    }

    public function login()
    {

?>
        <html>


        <div class="container d-flex flex-column">
            <div class="row align-items-center justify-content-center g-0 min-vh-100">
                <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                    <!-- Card -->
                    <div class="card shadow">
                        <!-- Card body -->
                        <div class="card-body p-6">
                            <div class="mb-4">
                                <a href="index.php?module=accueil"><img src="ressource/livreTest.png" class="mb-4" alt="" /></a>
                                <h1 class="mb-1 fw-bold">Connecte toi</h1>
                                <span>Tu n'as pas de compte?
                                    <a href="index.php?action=print_signup&module=connexion" class="ms-1">Créé en un !</a></span>
                            </div>
                            <!-- Form -->
                            <form method="post" action="index.php?action=login&module=connexion">
                                <!-- Username -->
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nom d'utilisateur</label>
                                    <input type="text" id="username" class="form-control" name="identifiant" placeholder="Nom d'utilisateur" required />
                                </div>
                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" id="password" class="form-control" name="pwd" placeholder="**************" required />
                                </div>
                                <div>
                                    <!-- Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            Connecte toi !
                                        </button>
                                    </div>
                                </div>
                                <hr class="my-4" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



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


        <div class="container d-flex flex-column">
            <div class="row align-items-center justify-content-center g-0 min-vh-100">
                <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                    <!-- Card -->
                    <div class="card shadow">
                        <!-- Card body -->
                        <div class="card-body p-6">
                            <div class="mb-4">
                                <a href="index.php?module=accueil"><img src="ressource/livreTest.png" class="mb-4" alt="" /></a>
                                <h1 class="mb-1 fw-bold">Inscription</h1>
                                <span>Tu as déja un compte?
                                    <a href="index.php?action=print_login&module=connexion" class="ms-1">Connecte toi !</a></span>
                            </div>
                            <!-- Form -->
                            <form method="post" action="index.php?action=signup&module=connexion">
                                <!-- Username -->
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nom d'utilisateur</label>
                                    <input type="text" id="username" class="form-control" name="identifiant" placeholder="Nom d'utilisateur" required />
                                </div>
                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control" name="mail" placeholder="Addresse Email" required />
                                </div>
                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" id="password" class="form-control" name="pwd" placeholder="**************" required />
                                </div>
                                <div>
                                    <!-- Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            Créé ton compte !
                                        </button>
                                    </div>
                                </div>
                                <hr class="my-4" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



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