<?php
require_once('vue_generique.php');

class Vue_Biblio extends vueGenerique
{


    public function __construct()
    {
        parent::__construct();
    }






    public function afficherBiblio($livre)
    {
?>
        <div class="row row-cols-1 row-cols-md-5 g-2">
            <?php
            foreach ($livre as $key) {
            ?>
                <div class="col">
                    <?php
                    $this->afficherLivreDansBiblio($key['id'], $key['titre'], $key['resumeLivre'], $key['nbrLike'], $key['nbrVue'], $key['userName'], $key['genres']);

                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    }





    public function afficherLivreDansBiblio($id, $titre, $resumeLivre, $nbrLike, $nbrVue, $userName, $genres)
    {
    ?>
        <a href="index.php?module=livre&idLivre=<?= $id ?>" id="LinkLivre">
            <div class="card h-100 text-bg-dark">
                <?php
                echo "<img src=\"ressource/bookCover/" . $id . "\" class=\"card-img-top\" alt=\"...\">";
                ?>
                <div class="card-body">
                    <?php

                    echo "<h5 class=\"card-title\">" . $titre . "</h5>";
                    $resume = $resumeLivre;
                    echo "<p class=\"card-subtitle mb-2 text-warning\">" . $userName . "</p>";
                    if (strlen($resume) > 100) {
                        $resume = substr($resume, 0, 100) . "...";
                    }
                    echo "<p class=\"card-text\">" . $resume . "</p>";
                    ?>
                </div>
                <div class="card-footer">
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
                    <div class="">
                        <?php


                        $explodGenre = explode(",", $genres);
                        if (isset($explodGenre[0])) {
                            echo "<span class=\"badge text-bg-warning ms-2 translate-mi\">" . $explodGenre[0] . "</span>";
                        }
                        if (isset($explodGenre[1])) {
                            echo "<span class=\"badge text-bg-warning ms-2 translate-mi\">" . $explodGenre[1] . "</span>";
                        }
                        if (isset($explodGenre[2])) {
                            echo "<span class=\"badge text-bg-warning ms-2 translate-mi\">" . $explodGenre[2] . "</span>";
                        }


                        // $this->afficherGenre($genres);
                        ?>
                    </div>
                </div>
            </div>
        </a>
<?php


    }
}

?>