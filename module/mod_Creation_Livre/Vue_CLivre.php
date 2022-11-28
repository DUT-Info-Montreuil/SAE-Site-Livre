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

        <form method="post" action="index.php?action=create_book&module=CLivre" enctype="multipart/form-data">
            <label for="formGroupExampleInput" class="form-label">Titre du livre</label>
            <input type="text" class="form-control" name="title" placeholder="le nom de votre histoire incroyable">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Resumé </label>
                <input type="text" class="form-control" name="resume" placeholder="le petit resumé ">
                <div class="mb-3">
                    <label for="formFile" class="form-label">premiere de couverture </label>
                    <input name="img" class="form-control" type="file" id="formFile" accept="image/*">
                </div>
                <?php
                foreach ($genre as $key) {

                ?>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="Genre<?= $key["id"]; ?>">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?= $key["genre"] ?>
                        </label>
                    </div>




                <?php
                }
                ?>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        cree le livre !
                    </button>
                </div>


        </form>





    <?php
    }
    public function write_book($idLivre , $idChapitre , $idPage , $numPage , $defaultStory)
    {
        
    ?>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="story" rows="40"><?=$defaultStory?></textarea>
            <button  class="btn btn-primary btn-lg" role="button" id="SavePage">save and quit </button>
            <button  class="btn btn-primary btn-lg" role="button" id="DontSavePage">just quit</button>
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
                                numPage : <?= $numPage ?> ,
                                idChapitre : <?= $idChapitre ?> ,
                                idPage : <?= $idPage ?> 
                                

                            },
                            
                        });
                    }, 1000);

                });


                $('#SavePage').click(function() {
                    $.ajax({
                        url: 'SavePage.php',
                        type: 'POST',
                        data: {
                            story: $('#story').val(),
                                idLivre: <?= $idLivre ?>,
                                idAuteur: <?= $_SESSION['id'] ?>,
                                numPage : <?= $numPage ?> ,
                                idChapitre : <?= $idChapitre ?> ,
                                idPage : <?= $idPage ?> ,
                                save : "true"

                        },
                        
                        
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
                                numPage : <?= $numPage ?> ,
                                idChapitre : <?= $idChapitre ?> ,
                                idPage : <?= $idPage ?> ,
                                save : "false"

                        },
                        success : function(){
                            alert("vous allez etre rediriger vers la page d'accueil");
                        }
                        
                    });
                });





            });
        </script>

    <?php



    }


    public function menu_write_book($allInfo){
        ?>
        <textarea class="form-control border" id="Title" rows="2" cols="20" maxlength="50" ><?=$allInfo[0][0]["titre"]?></textarea>
        <textarea class="form-control border" id="ResumeLivre" rows="5" cols="30" maxlength="1000" ><?=$allInfo[0][0]["resumeLivre"]?></textarea>

        <?php
        for ($i=0; $i < count($allInfo[1]); $i++) { 
            ?>
            <textarea class="form-control border Chapitre" id="Chapitre".$i rows="1" cols="25" maxlength="25" ><?=$allInfo[1][$i]["titre"]?></textarea>
            <?php
            for ($j=0; $j < count($allInfo[2][$i]); $j++) { 
                ?>
                <p1><?=$allInfo[2][$i][$j]["TexteDeLaPage"] ?> </p1>
                <p2><?=$allInfo[2][$i][$j]["numeroPage"]?></p2>
                <?php
            }
        }

        ?>
        <script>
            (window).on('load', function() {
                
                var timer = null;
                $('.Chapitre').on('input', function() {
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
                                
                                

                            },
                            
                        });
                    }, 1000);

                });



        </script>


        <?php 





    }




}



?>