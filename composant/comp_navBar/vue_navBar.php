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
        <html>
        <header class="p-3 text-bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                    </form>
                    <?php
                    if (isset($_SESSION["connected"])) {
                    ?>
                        <div class="dropdown">
                            <button id="ppDropDown" class="rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="index.php?module=connexion&action=disconnect">deconnexion</a></li>
                            </ul>
                        </div>



                    <?php

                    } else { ?>
                        <div class="text-end">
                            <!-- <a href="index.php?action=print_signup&module=connexion" class="btn btn-outline-light me-2" role="button">sign up</a>  -->
                            <a href="index.php?action=print_login&module=connexion" class="btn btn-warning" role="button">Login</a>
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