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



        <div class="container d-flex flex-column">
            <div class="row align-items-center justify-content-center g-0 min-vh-100">
                <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                    <!-- Card -->
                    <div class="card shadow">
                        <!-- Card body -->
                        <div class="card-body p-6">
                            <div class="mb-4">
                                <a href="index.php?module=accueil" class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                    </svg>
                                </a>
                                <h1 class="mb-1 fw-bold">Connecte toi</h1>
                                <span>Tu n'as pas de compte?
                                    <a href="index.php?action=print_signup&module=connexion" class="ms-1">Crée en un !</a></span>
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



    <?php


    }

    public function signup()
    {

    ?>


        <div class="container d-flex flex-column">
            <div class="row align-items-center justify-content-center g-0 min-vh-100">
                <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                    <!-- Card -->
                    <div class="card shadow">
                        <!-- Card body -->
                        <div class="card-body p-6">
                            <div class="mb-4">
                                <a href="index.php?module=accueil " class="text-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                    </svg>
                                </a>
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


<?php

    }
}



?>