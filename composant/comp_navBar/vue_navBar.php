<?php
require_once("vue_generique.php");

class VueNavBar extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }
    public function printnavBar()
    {
?>

        <header class="p-3 text-bg-dark">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="powerIcon" viewBox="0 0 16 16">
                    <path d="M7.5 1v7h1V1h-1z"/>
                    <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                </symbol>

                <symbol id="bookIcon" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                </symbol>

                <symbol id="profileIcon" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </symbol>
            </svg>
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap"/>
                        </svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="http://localhost/~mdhaeyere/SAE-Site-Livre/index.php" class="nav-link px-2 text-secondary">Home</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                        <li><a href="index.php?module=bibliotheque" class="nav-link px-2 text-white">Bibliothèque</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..."
                               aria-label="Search">
                    </form>
                    <?php
                    if (isset($_SESSION["connected"])) {
                        ?>
                        <div class="dropdown">
                            <button id="ppDropDown" class="rounded-circle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?module=profil&action=afficherProfil">
                                        <svg class="bi bi-person-circle" width="16" height="16">
                                            <use xlink:href="#profileIcon"/>
                                        </svg>
                                        Profile
                                    </a></li>
                                <li>
                                    <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
                                        <svg class="bi bi-book" width="16" height="16">
                                            <use xlink:href="#bookIcon"/>
                                        </svg>
                                        other action
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item d-flex gap-2 align-items-center"
                                       href="index.php?module=connexion&action=disconnect">
                                        <svg class="bi" width="16" height="16">
                                            <use xlink:href="#powerIcon"/>
                                        </svg>
                                        deconnexion
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php

                    } else { ?>
                        <div class="text-end">
                            <!-- <a href="index.php?action=print_signup&module=connexion" class="btn btn-outline-light me-2" role="button">sign up</a>  -->
                            <a href="index.php?action=print_login&module=connexion" class="btn btn-warning"
                               role="button">Login</a>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </header>

        </html>
        <?php
    }
}

?>