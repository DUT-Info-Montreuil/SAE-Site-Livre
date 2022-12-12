<?php
require_once("vue_generique.php");
class Vue_CLivre extends vueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }


    public function print_create_book($genre)
    {
?>

        <div class="container">
            <main>
                <div class="row g-5" id="creaLivre">
                    <div>
                        <h4 class="mb-3">Créé ton propre livre !</h4>
                        <form class="needs-validation" method="post" action="index.php?action=create_book&module=CLivre&token=<?=$_SESSION['token']?>" enctype="multipart/form-data" novalidate>

                            <div class="row g-3">
                                <div class="col-sm-6 col-lg-4 " id="TitreCrea">
                                    <label for="Titre" class="form-label">Titre du livre</label>
                                    <input type="text" class="form-control" name="title" placeholder="Titre de votre histoire" required>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">premiere de couverture <span class="text-muted">(Optional)</label>
                                        <input name="fileToUpload" class="form-control" type="file" id="fileToUpload" accept="image/png">
                                    </div>
                                </div>



                                <div class="col-12">
                                    <label for="Resume" class="form-label">Resumé </label>
                                    <input type="text" class="form-control" name="resume" placeholder="le petit resumé ">
                                </div>
                            </div>
                            <hr class="my-4">
                            <h4 class="mb-3">Genre</h4>
                            <div class="row row-cols-md-3 g-1">
                                <?php
                                foreach ($genre as $key) {

                                ?>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="Genre<?= $key["id"]; ?>">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <?= $key["genre"] ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <hr class="my-4">

                            <button class="w-100 btn btn-primary btn-lg" type="submit">créé le livre !</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>





    <?php
    }
    public function write_Pages($idLivre, $idChapitre,$numChapitre, $idPage, $numPage, $defaultStory)
    {

    ?>
        <div class="form-group" id="test23">
            <h3 class="mb-3 storyElement">Vous êtes sur la page <?=$numPage?> du chapitre <?= $numChapitre?> </h3>
            <button class="btn btn-primary btn-lg storyElement" role="button" id="SavePage">save and quit </button>
            <button class="btn btn-primary btn-lg storyElement" role="button" id="DontSavePage">just quit</button>
            <button type="button" href="" class="btn btn-danger btn-lg storyElement" data-bs-toggle="modal" id="delPage" data-bs-target="#supprConf">supprimer la page </button>

            <textarea class="form-control" id="story" rows="40"><?= $defaultStory ?></textarea>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="supprConf" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        etes vous sur de vouloir supprimer la page <?= $numPage ?> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">annuler</button>
                        <a type="button" href="index.php?module=CLivre&action=delPage&token=<?= $_SESSION['token']?>&idLivre=<?= $idLivre ?>&idChapitre=<?= $idChapitre ?>&idPage=<?= $idPage ?>" class="btn btn-danger">SUPPRIMER</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(window).on('load', function() {

                var timer = null;
                $('#story').on('input', function() {

                    if (timer != null) {
                        clearTimeout(timer); //cancel the previous timer.
                        timer = null;
                    }
                    timer = setTimeout(function() {
                        //put your ajax call here
                        $.ajax({
                            url: 'TempSave.php',
                            type: 'POST',
                            data: {
                                story: $('#story').val(),
                                idLivre: <?= $idLivre ?>,
                                idAuteur: <?= $_SESSION['id'] ?>,
                                numPage: <?= $numPage ?>,
                                idChapitre: <?= $idChapitre ?>,
                                idPage: <?= $idPage ?>


                            }

                        });
                    }, 1000);

                });


                $('#SavePage').on('click',function() {
                    
                    $.ajax({
                        url: 'SavePage.php',
                        type: 'POST',
                        data: {
                            story: $('#story').val(),
                            idLivre: <?= $idLivre ?>,
                            idAuteur: <?= $_SESSION['id'] ?>,
                            numPage: <?= $numPage ?>,
                            idChapitre: <?= $idChapitre ?>,
                            idPage: <?= $idPage ?>,
                            save: "true"

                        },
                        done: function(data) {
                            alert(data);
                            //window.location.href = "index.php?action=menu_write_book&module=CLivre&idLivre=<?= $idLivre ?>";
                        }

                    });
                });



                $('#DontSavePage').click(function() {
                    $.ajax({
                        url: 'SavePage.php',
                        type: 'POST',
                        data: {
                            story: $('#story').val(),
                            idLivre: <?= $idLivre ?>,
                            idAuteur: <?= $_SESSION['id'] ?>,
                            numPage: <?= $numPage ?>,
                            idChapitre: <?= $idChapitre ?>,
                            idPage: <?= $idPage ?>,
                            save: "false"

                        },
                        success: function() {
                            //window.location.href = "index.php?action=menu_write_book&module=CLivre&idLivre=<?= $idLivre ?>";
                        }

                    });
                });





            });
        </script>

    <?php



    }


    public function menu_write_book($allInfo)
    {
    ?>
        <textarea class="form-control border" id="Title" rows="2" cols="20" maxlength="50"><?= $allInfo[0][0]["titre"] ?></textarea>
        <textarea class="form-control border" id="ResumeLivre" rows="5" cols="30" maxlength="1000"><?= $allInfo[0][0]["resumeLivre"] ?></textarea>
        <a href="index.php?module=CLivre&action=newChapter&token=<?=$_SESSION["token"]?>&idLivre=<?= $allInfo[0][0]['id'] ?>" class="btn btn-primary btn-lg" role="button">cree un nouveau chapitre</a>

        <?php
        for ($i = 0; $i < count($allInfo[1]); $i++) {
        ?>
            <textarea class="form-control border Chapitre" id=<?= $allInfo[1][$i]["id"] ?> rows="1" cols="25" maxlength="25"><?= $allInfo[1][$i]["titre"] ?></textarea>
            <a href="index.php?module=CLivre&action=delChapter&<?=$_SESSION["token"]?>&idLivre=<?= $allInfo[0][0]['id'] ?>&idChapitre=<?= $allInfo[1][$i]['id'] ?>" class="btn btn-danger btn-lg" role="button">supprimer chapitre</a>
            <div class="row row-cols-md-3 g-1">
                <?php

                for ($j = 0; $j < count($allInfo[2][$i]); $j++) {
                ?>

                    <div class="col pages">
                        <a href="index.php?module=CLivre&action=print_write_Pages&idLivre=<?= $allInfo[0][0]["id"] ?>&idChapitre=<?= $allInfo[1][$i]["id"] ?>&numeroChap=<?= $allInfo[1][$i]["numeroChap"]?>&idPage=<?= $allInfo[2][$i][$j]["ID"] ?>&numPage=<?= $allInfo[2][$i][$j]["numeroPage"] ?>" class="btn btn-primary btn-lg" role="button" id=<?= $allInfo[2][$i][$j]["ID"] ?>><?= $allInfo[2][$i][$j]["numeroPage"] ?></a>
                    </div>
                <?php

                }
                ?>
            </div>
            <a href="index.php?module=CLivre&action=newPage&token=<?=$_SESSION["token"]?>&idChapitre=<?= $allInfo[1][$i]['id'] ?>&idLivre=<?= $allInfo[0][0]['id'] ?>" class="btn btn-primary btn-lg" role="button">cree une nouvel page pour le chapitre</a>
        <?php
        }





        ?>
        <script>
            $(window).on('load', function() {
                        //tout dans un div + boucle sur les child pour cree on input event pout tout les child
                        //boucle sur all info et quand $i == i alors on recup l'id et on la post 



                        var timer = null;
                        $('#Title').on('input', function() {
                            console.log("input");
                            if (timer != null) {
                                clearTimeout(timer); //cancel the previous timer.
                                timer = null;
                            }
                            timer = setTimeout(function() {
                                //put your ajax call here
                                $.ajax({
                                    url: 'ChangeInfoBook.php',
                                    type: 'POST',
                                    data: {
                                        story: $('#Title').val(),
                                        idLivre: <?= $allInfo[0][0]["id"] ?>,
                                        idAuteur: <?= $_SESSION['id'] ?>,
                                        whatHaveChanged: "titre"


                                    },


                                });
                            }, 1000);

                        });



                        var timer = null;
                        $('#ResumeLivre').on('input', function() {

                            if (timer != null) {
                                clearTimeout(timer); //cancel the previous timer.
                                timer = null;
                            }
                            timer = setTimeout(function() {
                                //put your ajax call here
                                $.ajax({
                                    url: 'ChangeInfoBook.php',
                                    type: 'POST',
                                    data: {
                                        story: $('#ResumeLivre').val(),
                                        idLivre: <?= $allInfo[0][0]["id"] ?>,
                                        idAuteur: <?= $_SESSION['id'] ?>,
                                        whatHaveChanged: "resumeLivre"


                                    }

                                });
                            }, 1000);

                        });



                        var timer = null;
                        $('.Chapitre').on('input', function($event) {
                            if (timer != null) {
                                clearTimeout(timer); //cancel the previous timer.
                                timer = null;
                            }



                            timer = setTimeout(function() {
                                $.ajax({
                                    url: 'ChangeInfoBook.php',
                                    type: 'POST',
                                    data: {
                                        story: $event.target.value,
                                        idChapitre: $event.target.id,
                                        idLivre: <?= $allInfo[0][0]["id"] ?>,
                                        idAuteur: <?= $_SESSION['id'] ?>,
                                        whatHaveChanged: "Chapitre"
                                    },

                                });
                            });



                        });
        </script>


<?php





    }
}



?>