<?php
require_once("vue_generique.php");

class Vue_Historique extends VueGenerique
{
    public function afficherAutreHistoriqueEcriture($livresEcrit, $nom){
        ?>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Historique d'écriture de <?= $nom ?> </h1>
                    <p class="lead text-muted">Ici se trouve tous les livres que <?= $nom ?> écrit ou a fini
                        d'écrire. Ils sont classé par ordre de date, du plus recemment modifié au plus ancien modifié.
                        Vous pouvez les lires en cliquant sur le bouton "lire" de l'un de
                        ces livres.</p>
                </div>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <?php
            if (count($livresEcrit) > 0) {
                if (count($livresEcrit) > 1) {
                }
                ?>
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php
                        foreach ($livresEcrit as $key) {
                            ?>
                            <div class="col-sm-3">
                                <div class="card text-center" style="width: 18rem; min-height: 20rem;">
                                    <div class="card-img-top">
                                        <?php echo "<a style=\"cursor: pointer\" id=\"imgLivre" . $key["id"] . "\">" ?>
                                        <?php echo "<img src=\"ressource/bookCover/" . $key["id"] . ".png\" class=\"img-fluid\" alt=\"...\"/>" ?>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $key["titre"] ?></h5>
                                        <p class="card-text"><?= $key["resumeLivre"] ?></p>
                                        <a type="button"
                                           href="index.php?module=livre&idLivre=<?= $key["id"] ?>&Chapitre=1"
                                           class="btn btn-outline-primary">lire</a>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <p style="text-align: center"><?= $nom ?> n'a écrit encore aucun livre</p>
                <?php
            }
            ?>
        </div>
        <?php

    }
    public function afficherHistoriqueLecture($livresLus)
    {
        ?>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Mon Historique de lecture</h1>
                    <p class="lead text-muted">Ici se trouve tous les livres que vous avez commencé à lire ou fini de
                        lire. Ils sont classé par ordre de date, du plus recemment lu au plus ancien lu. Vous pouvez
                        reprendre votre lecture en cliquant sur le bouton "reprendre lecture" de l'un de ces livres.</p>
                </div>
            </div>
        </section>
        <div class="album py-5 bg-light">
        <?php
        if (count($livresLus) > 0) {
            if (count($livresLus) > 1) {
            }
            ?>
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php
                        foreach ($livresLus as $key) {
                            ?>
                            <div class="col-sm-3">
                                <div class="card text-center" style="width: 18rem; min-height: 20rem;">
                                    <div class="card-img-top">
                                        <?php echo "<a style=\"cursor: pointer\" id=\"imgLivre" . $key["id_livre_lu"] . "\">" ?>
                                        <?php echo "<img src=\"ressource/bookCover/" . $key["id_livre_lu"] . ".png\" class=\"img-fluid\" alt=\"...\"/>" ?>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $key["titre"] ?></h5>
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

                            <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
        } else {
           ?>
            <p style="text-align: center">Vous n'avez lu aucun livre</p>
                <?php
        }
        ?>
        </div>
        <?php

    }

    public function afficherMonHistoriqueEcriture($livresEcrit)
    {
        ?>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Mon Historique d'écriture</h1>
                    <p class="lead text-muted">Ici se trouve tous les livres que vous avez commencé à écrire ou fini
                        d'écrire. Ils sont classé par ordre de date, du plus recemment modifié au plus ancien modifié.
                        Vous pouvez reprendre votre écriture en cliquant sur le bouton "reprendre l'écriture" de l'un de
                        ces livres.</p>
                </div>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <?php
            if (count($livresEcrit) > 0) {
                if (count($livresEcrit) > 1) {
                }
                ?>
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php
                        foreach ($livresEcrit as $key) {
                            ?>
                            <div class="col-sm-3">
                                <div class="card text-center" style="width: 18rem; min-height: 20rem;">
                                    <div class="card-img-top">
                                        <?php echo "<a style=\"cursor: pointer\" id=\"imgLivre" . $key["id"] . "\">" ?>
                                        <?php echo "<img src=\"ressource/bookCover/" . $key["id"] . ".png\" class=\"img-fluid\" alt=\"...\"/>" ?>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $key["titre"] ?></h5>
                                        <p class="card-text"><?= $key["resumeLivre"] ?></p>
                                        <a type="button"
                                           href="index.php?module=livre&idLivre=<?= $key["id"] ?>&Chapitre=1"
                                           class="btn btn-outline-primary">reprendre l'écriture</a>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <p style="text-align: center">Vous n'avez écrit aucun livre</p>
                <?php
            }
            ?>
        </div>
        <?php


    }
}
