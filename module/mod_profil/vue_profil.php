<?php
require_once("vue_generique.php");

class vue_profil extends vueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function print_autreprofil($autreEmail, $autreNom, $livresEcrits, $estAbonne, $mesLivresLus)
    {
        ?>
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
                                <h5 class="my-3" id="nomProfil"><?php echo $autreNom ?></h5>
                                <p class="text-muted mb-1">Full Stack Developer</p>
                                <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <button type="button" class="btn btn-outline-primary" id="suivre">Suivre</button>
                                </div>
                                <div class="d-flex justify-content-center mb-2">
                                    <button type="button" class="btn btn-primary" id="suivi">
                                        Suivi
                                        <svg xmlns="http://www.w3.org/2000/svg" id="img-check-suivi" width="16"
                                             height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                        </svg>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <script>
                            <?php
                            if($estAbonne){
                            ?>
                            $("#suivre").hide();
                            <?php
                            }
                            else{
                            ?>
                            $("#suivi").hide();
                            <?php
                            }
                            ?>
                            $("#suivre").click(function () {
                                $.ajax({
                                    url: "abonnement.php",
                                    type: "POST",
                                    data: {
                                        action: "abonne",
                                        contenu: "<?= $autreNom ?>"
                                    },
                                }).done(function (data) {
                                    $("#suivre").first().fadeOut("speed", function fadeNext() {
                                        $("#img-check-suivi").hide();
                                        $("#suivi").fadeIn();
                                        $("#img-check-suivi").slideDown("slow");

                                    });
                                }).fail(function (data, status, type) {
                                    alert("data : " + data + "\nstatus : " + status + "\ntype : " + type);
                                });
                            });

                            $("#suivi").click(function () {
                                $.ajax({
                                    url: "abonnement.php",
                                    type: "POST",
                                    data: {
                                        action: "desabonne",
                                        contenu: "<?= $autreNom ?>"
                                    },
                                }).done(function (data) {
                                    $("#img-check-suivi").slideUp();
                                    $("#suivi").fadeOut("speed", function fadeNext() {
                                        $("#suivre").fadeIn();
                                    });
                                }).fail(function (data, status, type) {
                                    alert("data : " + data + "\nstatus : " + status + "\ntype : " + type);
                                });
                            });
                        </script>
                        <div class="card mb-4 mb-lg-4">
                            <div class="card-body text-center">
                                <h5 class="card-title text-center">Livres écrits</h5>
                                <div class="list-group" id="write-list-history">
                                    <?php
                                    if (count($livresEcrits) > 0) {
                                        if (count($livresEcrits) > 1) {
                                        }
                                        foreach ($livresEcrits as $key) {
                                            ?>
                                            <div class="list-group-item card mb-3" style="max-width: 540px;">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <?php echo "<a style=\"cursor: pointer\" id=\"imgLivre" . $key["id"] . "\">" ?>
                                                        <?php echo "<img src=\"ressource/bookCover/" . $key["id"] . ".png\" class=\"img-fluid rounded-start\" alt=\"...\"/>" ?>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-head">
                                                            <h5 class="card-title"><?= $key["titre"] ?></h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text"><?= $key["resumeLivre"] ?></p>
                                                            <?php
                                                            $livreLu = false;
                                                            foreach ($mesLivresLus as $key2) {
                                                                if ($key2["id_livre_lu"] === $key["id"]) {
                                                                    $livreLu = true;
                                                                    ?>
                                                                    <a type="button"
                                                                       href="index.php?module=livre&idLivre=<?= $key["id"] ?>&Chapitre=<?= $key2["dernier_chapitre_lu"] ?>"
                                                                       class="btn btn-outline-primary">reprendre la
                                                                        lecture</a>
                                                                    <div class="card-bottom">
                                                                        <p class="card-text"><small class="text-muted">lu
                                                                                il y
                                                                                a <?php $dateDiff = date_diff(new DateTime(date("Y-m-d H:i:s", strtotime($key2["date_heure_lecture"]))), new DateTime(date("Y-m-d H:i:s")));
                                                                                echo $dateDiff->format('%d') . "j " . $dateDiff->format('%H') . "h " . $dateDiff->format('%i') . "m " . $dateDiff->format('%s') . "s" ?></small>
                                                                        </p>
                                                                    </div>
                                                                    <?php
                                                                    break;
                                                                }
                                                            }
                                                            if (!$livreLu) {
                                                                ?>
                                                                <a type="button"
                                                                   href="index.php?module=livre&idLivre=<?= $key["id"] ?>&Chapitre=1"
                                                                   class="btn btn-outline-primary">commencer la
                                                                    lecture</a>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo "Cet utilisateur n'a pas encore écrit de livres";
                                    }

                                    ?>
                                    <div class="card-bottom text-center mb-2">
                                        <a href="index.php?module=historique&action=historiqueEcriture&id=<?= $_GET['id'] ?>"
                                           type="button"
                                           class="btn btn-outline-secondary">voir plus</a>
                                    </div>
                                </div>
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
                                    <div class="col-sm-4 afficherNom">
                                        <p id="name" class="text-muted mb-0">
                                            <?php echo $autreNom ?>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-1 ms-4">Email</p>
                                    </div>
                                    <div class="col-sm-4 afficherEmail">
                                        <p class="text-muted mb-0" id="email"><?php echo $autreEmail ?></p>
                                    </div>
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
            </div>
        </section>
        </body>
        <?php
    }

    public function print_monprofil($livresLus, $livresEcrits, $mesAbonnements)
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
                                <h5 class="my-3" id="nomProfil"><?php echo $_SESSION["identifiant"] ?></h5>
                                <p class="text-muted mb-1">Full Stack Developer</p>
                                <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-4">
                            <div class="card-body text-center">
                                <h5 class="card-title text-center">Historique</h5>
                                <div class="btn-group mb-lg-4" role="group">
                                    <input type="radio" class="btn-check" name="HistoryBtnRadio" id="btnHistoryRead"
                                           autocomplete="off" checked>
                                    <label class="btn btn-outline-secondary" for="btnHistoryRead"
                                           id="btnHistoryReadLabel">
                                        Lecture
                                    </label>

                                    <input type="radio" class="btn-check" name="HistoryBtnRadio" id="btnHistoryWrite"
                                           autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btnHistoryWrite"
                                           id="btnHistoryWriteLabel">
                                        Ecriture
                                    </label>
                                </div>
                                <div class="list-group" id="read-list-history">
                                    <?php
                                    if (count($livresLus) > 0) {
                                        if (count($livresLus) > 1) {
                                        }
                                        foreach ($livresLus as $key) {
                                            ?>
                                            <div class="list-group-item card mb-3" style="max-width: 540px;">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <?php echo "<a style=\"cursor: pointer\" id=\"imgLivre" . $key["id_livre_lu"] . "\">" ?>
                                                        <?php echo "<img src=\"ressource/bookCover/" . $key["id_livre_lu"] . ".png\" class=\"img-fluid rounded-start\" alt=\"...\"/>" ?>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-head">
                                                            <h5 class="card-title"><?= $key["titre"] ?></h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text"><?= $key["resumeLivre"] ?></p>
                                                            <a type="button"
                                                               href="index.php?module=livre&idLivre=<?= $key["id_livre_lu"] ?>&Chapitre=<?= $key["dernier_chapitre_lu"] ?>"
                                                               class="btn btn-outline-primary">reprendre la lecture</a>
                                                        </div>
                                                        <div class="card-bottom">
                                                            <p class="card-text"><small class="text-muted">lu il y
                                                                    a <?php $dateDiff = date_diff(new DateTime(date("Y-m-d H:i:s", strtotime($key["date_heure_lecture"]))), new DateTime(date("Y-m-d H:i:s")));
                                                                    echo $dateDiff->format('%d') . "j " . $dateDiff->format('%H') . "h " . $dateDiff->format('%i') . "m " . $dateDiff->format('%s') . "s" ?></small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo "vous n'avez pas encore lu de livres";
                                    }

                                    ?>
                                    <div class="card-bottom text-center mb-2">
                                        <a href="index.php?module=historique&action=historiqueLecture" type="button"
                                           class="btn btn-outline-secondary">voir plus</a>
                                    </div>
                                </div>
                                <script>
                                    $("#imgLivre<?=$key["id_livre_lu"]?>").click(function () {
                                        alert(<?="<img src=\"ressource/bookCover/" . $key["id_livre_lu"] . ".png\""?>);
                                    });
                                </script>

                                <div class="list-group" id="write-list-history">
                                    <?php
                                    if (count($livresEcrits) > 0) {
                                        if (count($livresEcrits) > 1) {
                                        }
                                        foreach ($livresEcrits as $key) {
                                            ?>
                                            <div class="list-group-item card mb-3" style="max-width: 540px;">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <?php echo "<a style=\"cursor: pointer\" id=\"imgLivre" . $key["id"] . "\">" ?>
                                                        <?php echo "<img src=\"ressource/bookCover/" . $key["id"] . ".png\" class=\"img-fluid rounded-start\" alt=\"...\"/>" ?>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-head">
                                                            <h5 class="card-title"><?= $key["titre"] ?></h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text"><?= $key["resumeLivre"] ?></p>
                                                            <a type="button"
                                                               href="index.php?module=livre&idLivre=<?= $key["id"] ?>&Chapitre=1"
                                                               class="btn btn-outline-primary">reprendre l'écriture</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo "vous n'avez pas encore écrit de livres";
                                    }

                                    ?>
                                    <div class="card-bottom text-center mb-2">
                                        <a href="index.php?module=historique&action=historiqueEcriture&id=<?= $_SESSION['id'] ?>"
                                           type="button"
                                           class="btn btn-outline-secondary">voir plus</a>
                                    </div>
                                </div>
                                <script>
                                    $("#write-list-history").hide();
                                    $("#btnHistoryRead").click(function () {
                                        $("#write-list-history").hide();
                                        $("#read-list-history").show();
                                    });
                                    //$("#write-list-history").addClass("d-none");
                                    $("#btnHistoryWrite").click(function () {
                                        $("#read-list-history").hide();
                                        $("#write-list-history").show();
                                    });
                                </script>
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
                                    <div class="modifierNom d-none col-sm-2">
                                        <input type="text" class="form-control" placeholder="new name"
                                               name="newName" id="inputName" required>
                                    </div>
                                    <div class="btn-group modifierNom d-none col-sm-2" role="group">
                                        <button id="ConfirmChangeNameButton" type="button"
                                                name="subAction" value="confirm"
                                                class="btn btn-outline-success mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-check-lg"
                                                 viewBox="0 0 16 16">
                                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                            </svg>
                                        </button>
                                        <button id="cancelChangeNameButton" type="button"
                                                class="btn btn-outline-danger mb-2" formnovalidate>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-x"
                                                 viewBox="0 0 16 16">
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-sm-4 afficherNom">
                                        <p id="name" class="text-muted mb-0">
                                            <?php echo $_SESSION["identifiant"] ?>
                                        </p>
                                    </div>
                                    <div class="col-sm-1 afficherNom">
                                        <button id="swapToChangeNameButton" type="button"
                                                class="btn btn-outline-secondary ms-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <script>
                                    $("#swapToChangeNameButton").click(function () {
                                        $(".afficherNom").addClass("d-none");
                                        $(".modifierNom").removeClass("d-none");
                                        $("#inputName").val("");
                                    });
                                    $("#cancelChangeNameButton").click(function () {
                                        $(".afficherNom").removeClass("d-none");
                                        $(".modifierNom").addClass("d-none");
                                    });
                                    $("#ConfirmChangeNameButton").click(function () {
                                        if ($("#inputName").val() !== "") {
                                            $.ajax({
                                                url: "changerValeurs.php",
                                                type: "POST",
                                                data: {
                                                    action: "changerNom",
                                                    contenu: $("#inputName").val()
                                                },
                                            }).done(function (data) {
                                                if (data.length === 6) {
                                                    $("#name").text($("#inputName").val());
                                                    $("#nomProfil").text($("#inputName").val());
                                                    $("#inputName").text("");
                                                } else {
                                                    alert(data);

                                                }
                                                $(".afficherNom").removeClass("d-none");
                                                $(".modifierNom").addClass("d-none");
                                            }).fail(function (data, status, type) {
                                                alert("data : " + data + "\nstatus : " + status + "\ntype : " + type);
                                            });
                                        } else {
                                            alert("Le nom doit être composé d'au moins une lettre!");
                                        }
                                    });
                                </script>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-1 ms-4">Email</p>
                                    </div>

                                    <div class="col-sm-2 modifierEmail d-none">
                                        <input type="email" class="form-control" placeholder="new email"
                                               name="newEmail" id="inputEmail" required>
                                    </div>
                                    <div class="btn-group col-sm-2 modifierEmail d-none" role="group">
                                        <button id="confirmChangeEmailButton" type="button"
                                                name="subAction" value="confirm"
                                                class="btn btn-outline-success mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-check-lg"
                                                 viewBox="0 0 16 16">
                                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                            </svg>
                                        </button>
                                        <button id="cancelChangeEmailButton" type="button"
                                                class="btn btn-outline-danger mb-2" formnovalidate>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-x"
                                                 viewBox="0 0 16 16">
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-sm-4 afficherEmail">
                                        <p class="text-muted mb-0" id="email"><?php echo $_SESSION["email"] ?></p>
                                    </div>
                                    <div class="col-sm-1 afficherEmail">
                                        <button id="swapToChangeEmailButton" type="button"
                                                class="btn btn-outline-secondary ms-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <script>
                                    $("#swapToChangeEmailButton").click(function () {
                                        $(".afficherEmail").addClass("d-none");
                                        $(".modifierEmail").removeClass("d-none");
                                        $("#inputEmail").val("");
                                    });
                                    $("#cancelChangeEmailButton").click(function () {
                                        $(".afficherEmail").removeClass("d-none");
                                        $(".modifierEmail").addClass("d-none");
                                    });
                                    $("#confirmChangeEmailButton").click(function () {
                                        if ($("#inputEmail").val() !== "" && $("#inputEmail").val().includes("@")) {
                                            $.ajax({
                                                url: "changerValeurs.php",
                                                type: "POST",
                                                data: {
                                                    action: "changerEmail",
                                                    contenu: $("#inputEmail").val()
                                                },
                                            }).done(function (data) {
                                                if (data.length === 6) {
                                                    $("#email").text($("#inputEmail").val());
                                                    $("#inputEmail").val("");
                                                } else {
                                                    alert(data);
                                                    $("#inputEmail").val("");
                                                }
                                                $(".afficherEmail").removeClass("d-none");
                                                $(".modifierEmail").addClass("d-none");
                                            }).fail(function (data, status, type) {
                                                alert("data : " + data + "\nstatus : " + status + "\ntype : " + type);
                                            });
                                        } else {
                                            alert("L'email est invalide!");
                                        }
                                    });
                                </script>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-1 ms-4">Mot de passe</p>
                                    </div>
                                    <div class="col-sm-2 modifierMDP d-none">
                                        <input type="password" id="inputMDP" class="form-control"
                                               placeholder="new password"
                                               name="newMDP" required>
                                    </div>
                                    <div class="col-sm-2 modifierMDP d-none btn-group" role="group">
                                        <button id="confirmChangeMDPButton" type="button"
                                                name="subAction" value="confirm"
                                                class="btn btn-outline-success mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-check-lg"
                                                 viewBox="0 0 16 16">
                                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                            </svg>
                                        </button>
                                        <button id="cancelChangeMDPButton" type="button"
                                                class="btn btn-outline-danger mb-2" formnovalidate>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-x"
                                                 viewBox="0 0 16 16">
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-sm-4 afficherMDP">
                                        <p class="text-muted mb-0 ms-4">**********</p>
                                    </div>
                                    <div class="col-sm-1 afficherMDP">
                                        <button id="swapToChangeMDPButton" type="button"
                                                class="btn btn-outline-secondary ms-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <script>
                                    $("#swapToChangeMDPButton").click(function () {
                                        $(".afficherMDP").addClass("d-none");
                                        $(".modifierMDP").removeClass("d-none");
                                        $("#inputMDP").val("");
                                    });
                                    $("#cancelChangeMDPButton").click(function () {
                                        $(".afficherMDP").removeClass("d-none");
                                        $(".modifierMDP").addClass("d-none");
                                    });
                                    $("#confirmChangeMDPButton").click(function () {
                                        if ($("#inputMDP").val() !== "") {
                                            $.ajax({
                                                url: "modiferProfil.php",
                                                type: "POST",
                                                data: {
                                                    action: "changerMDP",
                                                    contenu: $("#inputMDP").val()
                                                },
                                            }).done(function (data) {
                                                if (data.length === 6) {
                                                    $("#password").text($("#inputMDP").val());
                                                    $("#inputMDP").val("");
                                                } else {
                                                    alert(data);
                                                }
                                                $(".afficherMDP").removeClass("d-none");
                                                $(".modifierMDP").addClass("d-none");
                                            }).fail(function (data, status, type) {
                                                alert("data : " + data + "\nstatus : " + status + "\ntype : " + type);
                                            });
                                        } else {
                                            alert("Le mdp est invalide!");
                                        }
                                    });
                                </script>
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
                        <div class="card mb-4">
                            <div class="card-header text-center">
                                <h5 class="mb-0">Abonnements</h5>
                            </div>
                            <div class="card-body text-center">
                                <?php
                                if (count($mesAbonnements) === 0) {

                                    echo "vous n'êtes abonné à personne";
                                }
                                foreach ($mesAbonnements as $key) {
                                    ?>
                                    <a href="index.php?module=profil&action=afficherProfil&id=<?= $key['id_utilisateur_suivi'] ?>"> <?= $key['id_utilisateur_suivi'] ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        </body>


        <?php
    }
}