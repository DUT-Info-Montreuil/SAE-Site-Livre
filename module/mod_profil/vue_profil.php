<?php
require_once("vue_generique.php");

class vue_profil extends vueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function print_profil()
    {
        ?>
        <!--<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="paramIcon" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
            </symbol>
        </svg>-->
        <body>
        <section style="background-color: #eee;">
            <div class="container py-4">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                     alt="avatar"
                                     class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3"><?php echo $_SESSION["identifiant"] ?></h5>
                                <p class="text-muted mb-1">Full Stack Developer</p>
                                <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <button type="button" class="btn btn-primary">Follow</button>
                                    <button type="button" class="btn btn-outline-primary ms-1"
                                            href="index.php?module=parametre&action=afficherParametre">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                                        </svg>
                                        Settings
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-4">
                            <div class="card-body text-center">
                                <h5 class="card-title text-center">Historique</h5>
                                <div class="btn-group mb-lg-4" role="group">
                                    <input type="radio" class="btn-check" name="HistoryBtnRadio" id="btnHistoryRead"
                                           autocomplete="off" checked>
                                    <label class="btn btn-outline-secondary" for="btnHistoryRead" id="btnHistoryReadLabel">
                                        Lecture
                                    </label>

                                    <input type="radio" class="btn-check" name="HistoryBtnRadio" id="btnHistoryWrite"
                                           autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btnHistoryWrite" id="btnHistoryWriteLabel">
                                        Ecriture
                                    </label>
                                </div>
                                <div class="list-group" id="read-list-history">
                                    <div class="list-group-item card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="ressource/livreTest.png" class="img-fluid rounded-start"
                                                     alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-head">
                                                    <h5 class="card-title">Titre du livre lu 1</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">résumé rapide du livre</p>
                                                    <button type="button" class="btn btn-outline-primary">reprendre la lecture</button>
                                                </div>
                                                <div class="card-bottom">
                                                    <p class="card-text"><small class="text-muted">lu il y a 5 minutes</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="ressource/drawinglibraryTest.png" class="img-fluid rounded-start"
                                                     alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-head">
                                                    <h5 class="card-title">Titre du livre lu 2</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">résumé rapide du livre</p>
                                                    <button type="button" class="btn btn-outline-primary">reprendre la lecture</button>
                                                </div>
                                                <div class="card-bottom">
                                                    <p class="card-text"><small class="text-muted">lu il y a 10 minutes</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group d-none" id="write-list-history">
                                    <div class="list-group-item card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="ressource/rainbowpencilTest.png" class="img-fluid rounded-start"
                                                     alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-head">
                                                    <h5 class="card-title">Titre du livre écrit 1</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">résumé rapide du livre</p>
                                                    <button type="button" class="btn btn-outline-primary">reprendre l'écriture</button>
                                                </div>
                                                <div class="card-bottom">
                                                    <p class="card-text"><small class="text-muted">modifié il y a 5 minutes</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="ressource/drawinglibraryTest.png" class="img-fluid rounded-start"
                                                     alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-head">
                                                    <h5 class="card-title">Titre du livre écrit 2</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">résumé rapide du livre</p>
                                                    <button type="button" class="btn btn-outline-primary">reprendre l'écriture</button>
                                                </div>
                                                <div class="card-bottom">
                                                    <p class="card-text"><small class="text-muted">modifié il y a 10 minutes</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <script>
                                    var readListHistory = document.getElementById("read-list-history");
                                    var writeListHistory = document.getElementById("write-list-history");
                                    var btnHistoryReadLabel = document.getElementById("btnHistoryReadLabel");
                                    var btnHistoryWriteLabel = document.getElementById("btnHistoryWriteLabel");
                                    function swapShowRead() {
                                        readListHistory.classList.remove("d-none");
                                        writeListHistory.classList.add("d-none");
                                    }
                                    function swapShowWrite() {
                                        writeListHistory.classList.remove("d-none");
                                        readListHistory.classList.add("d-none");
                                    }

                                    btnHistoryReadLabel.addEventListener("click", swapShowRead);
                                    btnHistoryWriteLabel.addEventListener("click", swapShowWrite);

                                </script>

                            </div>
                            <div class="card-bottom text-center mb-2">
                                <button type="button" class="btn btn-outline-secondary">voir plus</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-1 ms-4">Nom</p>
                                    </div>
                                    <?php
                                    if (isset($_GET["changeNameClicked"]) && $_GET["changeNameClicked"] == "true") {
                                        ?>
                                        <div class="col-sm-5">
                                            <form class="row g-2" action="index.php?module=profil&action=modifierNom"
                                                  method="post">

                                                <div class="col-auto">
                                                    <input type="text" class="form-control" placeholder="new name"
                                                           name="newName" required>
                                                </div>
                                                <div class="col-auto">
                                                    <button id="ConfirmChangeNameButton" type="submit"
                                                            name="subAction" value="confirm"
                                                            class="btn btn-outline-success mb-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-check-lg"
                                                             viewBox="0 0 16 16">
                                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="col-auto">
                                                    <button id="cancelChangeNameButton" type="submit"
                                                            class="btn btn-outline-danger mb-2" formnovalidate>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-x"
                                                             viewBox="0 0 16 16">
                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="col-sm-4">
                                            <p id="name" class="text-muted mb-0">
                                                <?php echo $_SESSION["identifiant"] ?>
                                            </p>
                                        </div>
                                        <div class="col-sm-1">
                                            <a role="button" id="swapToChangeNameButton" type="button"
                                               class="btn btn-outline-secondary ms-0"
                                               href="index.php?module=profil&action=afficherProfil&changeNameClicked=true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                </svg>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-1 ms-4">Email</p>
                                </div>
                                <?php
                                if (isset($_GET["changeEmailClicked"]) && $_GET["changeEmailClicked"] == "true") {
                                    ?>
                                    <div class="col-sm-5">
                                        <form class="row g-2" action="index.php?module=profil&action=modifierEmail"
                                              method="post">

                                            <div class="col-auto">
                                                <input type="email" class="form-control" placeholder="new email"
                                                       name="newEmail" required>
                                            </div>
                                            <div class="col-auto">
                                                <button id="confirmChangeEmailButton" type="submit"
                                                        name="subAction" value="confirm"
                                                        class="btn btn-outline-success mb-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-check-lg"
                                                         viewBox="0 0 16 16">
                                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="col-auto">
                                                <button id="cancelChangeEmailButton" type="submit"
                                                        class="btn btn-outline-danger mb-2" formnovalidate>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-x"
                                                         viewBox="0 0 16 16">
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <?php

                                } else {

                                    ?>
                                    <div class="col-sm-4">
                                        <p class="text-muted mb-0"><?php echo $_SESSION["email"] ?></p>
                                    </div>
                                    <div class="col-sm-1">
                                        <a role="button" id="swapToChangeEmailButton" type="button"
                                           class="btn btn-outline-secondary ms-0"
                                           href="index.php?module=profil&action=afficherProfil&changeEmailClicked=true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-1 ms-4">Mot de passe</p>
                                </div>
                                <?php
                                if (isset($_GET["changeMDPClicked"]) && $_GET["changeMDPClicked"] == "true") {

                                    ?>
                                    <div class="col-sm-5">
                                        <form class="row g-2" action="index.php?module=profil&action=modifierMDP"
                                              method="post">

                                            <div class="col-auto">
                                                <input type="password" class="form-control" placeholder="new password"
                                                       name="newMDP" required>
                                            </div>
                                            <div class="col-auto">
                                                <button id="confirmChangeMDPButton" type="submit"
                                                        name="subAction" value="confirm"
                                                        class="btn btn-outline-success mb-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-check-lg"
                                                         viewBox="0 0 16 16">
                                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="col-auto">
                                                <button id="cancelChangeMDPButton" type="submit"
                                                        class="btn btn-outline-danger mb-2" formnovalidate>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-x"
                                                         viewBox="0 0 16 16">
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                } else {

                                    ?>
                                    <div class="col-sm-4">
                                        <p class="text-muted mb-0 ms-4">**********</p>
                                    </div>
                                    <div class="col-sm-1">
                                        <a role="button" id="swapToChangeMDPButton" type="button"
                                           class="btn btn-outline-secondary ms-0"
                                           href="index.php?module=profil&action=afficherProfil&changeMDPClicked=true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-3 ms-4">Example</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">example content</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </body>


        <?php
    }
}