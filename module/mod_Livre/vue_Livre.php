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
        echo "c'est la vue livre";
        foreach ($livre as $key) {
            $id = $key['id'];
            echo "<h1>" . $key['titre'] . "</h1>";
            echo "<p>" . $key['resumeLivre'] . "</p>";
            echo "<p>" . $key['nbrVue'] . "</p>";
            echo "<p>" . $key['nbrLike'] . "</p>";
            echo "<a href=\"index.php?module=livre&idLivre=$id&Chapitre=1\" class=\"btn btn-primary btn-lg\" role=\"button\" id=\"VoireLIVRE\">Débuter la lecture</a>";
        }
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
        if ($currentChap == 1) {
            $PreviousButtonStat = "disabled";
        } else {
            $PreviousButtonStat = "enabled";
        }

        if ($currentChap == $nbrChap['NbrDeChapitre']) {

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