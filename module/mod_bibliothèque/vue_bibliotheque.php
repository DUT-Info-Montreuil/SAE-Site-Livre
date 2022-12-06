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
        $genreUnique = array();
        $i = 0;
        foreach ($livre as $key) {
            $explodGenre = explode(",", $key['genres']);
            foreach ($explodGenre as $key2) {
                if (!in_array($key2, $genreUnique)) {
                    $genreUnique[$i] = $key2;
                    $i++;
                }
            }
        }
        ?>
        <section class="py-5 container">
            <div class="row text-center py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Bibliothèque</h1>
                    <p class="lead text-muted">Voici la liste de tous les livres disponibles sur le site. <br> Vous
                        pouvez cliquer sur "afficher les filtres" pour voir les différents filtres disponibles. Que les
                        filtres soient visibles ou cachés, ceux que vous avez selectionnés sont toujours actifs</p>
                </div>
            </div>
            <button type="button" class="btn btn-outline-primary mb-3" id="developper">afficher les filtres</button>
            <button type="button" class="btn btn-outline-primary mb-3" id="reduire">cacher les filtres</button>
            <div class="container" id="filtres">
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" name="btnTrie" id="trieParGenre" autocomplete="off">
                    <label class="btn btn-outline-secondary mb-2" for="trieParGenre"
                           id="labelTrieParGenre">
                        filtres des genres
                    </label>
                </div>
                <div class="btn-toolbar" role="toolbar" id="boutonsFiltreGenres">
                    <?php
                    foreach ($genreUnique as $key) {
                        ?>
                        <div class="group me-2">
                            <input type="checkbox" class="btn-check genreCheck" id="boutonGenre<?= $key ?>"
                                   value="<?= $key ?>">
                            <label class="btn btn-outline-secondary" for="boutonGenre<?= $key ?>"
                                   id="labelGenre<?= $key ?>">
                                <?= $key ?>
                            </label>
                        </div>

                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <div class="album py-5 bg-light">
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
        </div>
        <script>
            $('#reduire').hide();
            $('#filtres').hide();
            $(':checkbox').prop('checked', false);
            $('#trieParGenre').prop('checked', true);
            $('#boutonsFiltreGenres').children().children().hide();

            $('#developper').click(function () {
                $('#boutonsFiltreGenres').children().children().show();
                $('#filtres').show();
                $('#developper').hide();
                $('#reduire').show();
            });
            $('#reduire').click(function () {
                $('#boutonsFiltreGenres').children().children().hide();
                $('#filtres').hide();
                $('#developper').show();
                $('#reduire').hide();
            });
            $('#labelTrieParGenre').on('click', function () {
                    $('#boutonsFiltreGenres').children().children().show();
            });

            //filtre par genre
            $('.genreCheck').on('change', function () {
                if ($('.genreCheck:checked').length == 0) {
                    $('.genreLivre').each(function () {
                        $(this).parent().parent().parent().parent().parent().show();
                    });
                } else {
                    $boxgenre = [];
                    $('.genreCheck:checked').each(function () {
                        //alert($(this).attr("value"));
                        $boxgenre.push($(this).attr("value"));
                    });

                    $idLivre = [];
                    $genreLivre = [[]];

                    $i = 0;
                    $j = 0;
                    $genreLivre = [];
                    $genreList = [];
                    $idLivre[0] = $('.genreLivre').parent().parent().parent().parent().attr("id");
                    $('.genreLivre').each(function () {

                        $id = $(this).parent().parent().parent().parent().attr("id");
                        //alert($id);
                        if ($idLivre.indexOf($id) === -1) {
                            $genreLivre[$i] = $genreList;
                            $i++;
                            $j = 0;
                            $genreList = [];
                            $idLivre[$i] = $id;
                        }
                        $genreList[$j] = $(this).html();
                        $j++;
                    });
                    $genreLivre[$i] = $genreList;

                    for($k = 0; $k < $genreLivre.length; $k++){
                        if($boxgenre.every(elem => $genreLivre[$k].includes(elem))){
                            $('#'+$idLivre[$k]).parent().show();
                        }
                        else {
                            $('#'+$idLivre[$k]).parent().hide();
                        }
                    }
                }

            });


        </script>
        <?php
    }


    public function afficherLivreDansBiblio($id, $titre, $resumeLivre, $nbrLike, $nbrVue, $userName, $genres)
    {
        ?>
        <a href="index.php?module=livre&idLivre=<?= $id ?>" class="LinkLivre" id="livre<?= $id ?>">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                    </svg>
                    <?php

                    echo "<small class=\"bi bi-hand-thumbs-up\">" . $nbrLike . "</small>";
                    ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-eye-fill ms-3" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                    </svg>
                    <?php echo "<small class=\"\">    " . $nbrVue . "</small>"; ?>
                    <div class="">
                        <?php


                        $explodGenre = explode(",", $genres);
                        if (isset($explodGenre[0])) {
                            echo "<span class=\"badge text-bg-warning ms-2 translate-mi genreLivre\">" . $explodGenre[0] . "</span>";
                        }
                        if (isset($explodGenre[1])) {
                            echo "<span class=\"badge text-bg-warning ms-2 translate-mi genreLivre\">" . $explodGenre[1] . "</span>";
                        }
                        if (isset($explodGenre[2])) {
                            echo "<span class=\"badge text-bg-warning ms-2 translate-mi genreLivre\">" . $explodGenre[2] . "</span>";
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