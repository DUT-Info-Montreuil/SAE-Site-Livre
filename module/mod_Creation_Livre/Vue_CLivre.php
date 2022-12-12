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
                        <form class="needs-validation" method="post" action="index.php?action=create_book&module=CLivre&token=<?= $_SESSION['token'] ?>" enctype="multipart/form-data" novalidate>

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

                            <button class="w-100 btn btn-warning btn-lg" type="submit">créé le livre !</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>





    <?php
    }
    public function write_Pages($idLivre, $idChapitre, $numChapitre, $idPage, $numPage, $defaultStory)
    {

    ?>
        <button type="button" class="btn btn-warning" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"></path>
            </svg>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Outil de configuration de la page</h5>
            </div>
            <div class="offcanvas-body">
                <div>
                    <button type="button" class="btn btn-primary" id="SavePage">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"></path>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"></path>
                        </svg>
                        Sauvgarder et quitter
                    </button>
                    <button type="button" class="btn btn-primary" id="DontSavePage">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                            <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z"></path>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
                        </svg>
                        quitter sans sauvgarder
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" id="delPege" data-bs-target="#supprConf">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                        </svg>
                        Supprimer la page
                    </button>
                    <br>
                    <br>
                    
                    <br>
                    <br>
                    <br>
                    <br>
                    
                    <br>
                    <br>
                    <p>Vous pouvez ici modifier la page séléctionné (par défaut la page n°1). <br> Pour modifier une autre page , ajouter une noulle page ou un chapitre, sauvgarder et quitté cette page avec le boutton ci-dessus.</p>
                </div>
            </div>
        </div>
        <div class="form-group" id="test23">

            <h2 class="mb-3 storyElement">Vous êtes sur la page N°<?= $numPage ?> du chapitre <?= $numChapitre ?> </h2>

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
                        <a type="button" href="index.php?module=CLivre&action=delPage&token=<?= $_SESSION['token'] ?>&idLivre=<?= $idLivre ?>&idChapitre=<?= $idChapitre ?>&idPage=<?= $idPage ?>" class="btn btn-danger">SUPPRIMER</a>
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
                            
                            window.location.href = "index.php?action=menu_write_book&module=CLivre&idLivre=<?= $idLivre ?>";
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
                            window.location.href = "index.php?action=menu_write_book&module=CLivre&idLivre=<?= $idLivre ?>";
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
                        <a href="index.php?module=CLivre&action=print_write_Pages&idLivre=<?= $allInfo[0][0]["id"] ?>&idChapitre=<?= $allInfo[1][$i]["id"] ?>&numeroChap=<?= $allInfo[1][$i]["numeroChap"] ?>&idPage=<?= $allInfo[2][$i][$j]["ID"] ?>&numPage=<?= $allInfo[2][$i][$j]["numeroPage"] ?>" class="btn btn-primary btn-lg" role="button" id=<?= $allInfo[2][$i][$j]["ID"] ?>><?= $allInfo[2][$i][$j]["numeroPage"] ?></a>
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
