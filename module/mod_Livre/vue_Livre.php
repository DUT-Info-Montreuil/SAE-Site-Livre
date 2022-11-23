<?php
require_once('vue_generique.php');

class Vue_Livre extends vueGenerique
{

    public function __construct()
    {
        parent::__construct();
    }
    public function afficherLivre($livre)
    {
        $idLivre = $livre['id'];
        $auteur = $livre['userName'];
        $titre = $livre['titre'];
        $resumeLivre = $livre['resumeLivre'];
        $nbrLike = $livre['nbrLike'];
        $nbrVue = $livre['nbrVue'];
        $genres = explode(",", $livre['genres']);
?>
        <section class="py-5 ">
            <div class="container  ">
                <div class="row">
                    <div class="col-lg-3 me-lg-auto">
                        <div class="card border-0 shadow mb-6 mb-lg-0 text-bg-dark">
                            <div class="card">
                                <?= "<img class=\"card-img-top \" src=\"ressource/bookCover/$idLivre\" alt=\"BookCover\">" ?>

                            </div>
                            <div class="card-footer">
                                <?= "<h5 class=\"card-title text-warning \"><strong>$auteur</strong></h5>" ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                </svg>
                                <?php

                                echo "<small class=\"bi bi-hand-thumbs-up\">" . $nbrLike . "</small>";
                                ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill ms-3" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                                <?php echo "<small class=\"\">    " . $nbrVue . "</small>"; ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 ps-lg-5">
                        <?= "<h1 class=\"hero-heading mb-0\">$titre</h1>" ?>

                        <div class="text-block">
                            <?php
                            foreach ($genres as $key) {
                                echo "<span class=\"badge rounded-pill text-bg-CustomeGenre text-bg-dark\">$key</span>";
                            }

                            echo "<p class=\"text-muted\">$resumeLivre</p>";
                            ?>
                        </div>
                        <?= "<a href=\"index.php?module=livre&idLivre=$idLivre&Chapitre=1\" class=\"btn btn- text-bg-warning\" role=\"button\" id=\"VoireLIVRE\">Débuter la lecture</a>" ?>

                    </div>
                </div>
            </div>
        </section>
        <?php
        /*         echo "c'est la vue livre";
        foreach ($livre as $key) {
            $id = $key['id'];
            echo "<h1>" . $key['titre'] . "</h1>";
            echo "<p>" . $key['resumeLivre'] . "</p>";
            echo "<p>" . $key['nbrVue'] . "</p>";
            echo "<p>" . $key['nbrLike'] . "</p>";
            echo "<a href=\"index.php?module=livre&idLivre=$id&Chapitre=1\" class=\"btn btn-primary btn-lg\" role=\"button\" id=\"VoireLIVRE\">Débuter la lecture</a>";
        } */
    }
    public function afficherPages($pages)
    {
        foreach ($pages as $key) {
        ?>
            <div class="d-flex pt-2">
                <p class="pb-3 mb-0  lh-base border-bottom">

                    <?php echo $key['TexteDeLaPage'] ?>
                </p>

            </div>
            <small class="d-block text-end mt-3"> <?php echo $key['numeroPage'] ?></small>



        <?php

        }
    }
    public function afficherChapitre($chapitre, $pages, $AllChap, $nbrChap)
    {
        $currentChap = $_GET['Chapitre'];

        //disabled
        //enabled
        if ($currentChap <= 1) {
            $PreviousButtonStat = "disabled";
        } else {
            $PreviousButtonStat = "enabled";
        }


        if ($currentChap >= $nbrChap['nbr']) {

            $NextButtonStat = "disabled";
        } else {
            $NextButtonStat = "enabled";
        }

        ?>

        <div class="my-3 p-3 bg-body rounded shadow-sm " id="ChapterContainer justy">
            <h4 class="border-bottom pb-2 mb-0"><?= $chapitre['titre'] ?></h6>
                <?php
                $this->afficherPages($pages);
                ?>

                <nav aria-label="ChapterSelectionPage">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?= $PreviousButtonStat ?>">
                            <a class="page-link" href="index.php?module=livre&idLivre=<?= $_GET['idLivre'] ?>&Chapitre=<?= $currentChap - 1 ?>">Précédent</a>

                        </li>
                        <div class="btn-group dropup justify-content-center">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Séléctionne un chapitre
                            </button>
                            <ul class="dropdown-menu">
                                <?php
                                foreach ($AllChap as $key) {
                                    $numChap = $key['numeroChap'];
                                    $ChapterName = "Chapitre " . $numChap;
                                    $idLivre = $_GET['idLivre'];
                                    echo "<li><a class=\"dropdown-item\" href=\"index.php?module=livre&idLivre=$idLivre&Chapitre=$numChap\">$ChapterName </a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <li class="page-item <?= $NextButtonStat ?>">
                            <a class="page-link" href="index.php?module=livre&idLivre=<?= $_GET['idLivre'] ?>&Chapitre=<?= $currentChap + 1 ?>">Suivant </a>
                        </li>
                        </li>
                    </ul>
                </nav>



        </div>

<?php

    }
}

?>