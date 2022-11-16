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
}



?>