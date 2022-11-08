<?php
require_once("vue_generique.php");
class Vue_CLivre extends vueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }


    public function print_create_book()
    {
        ?>
        <html>
            <form">
                <label for="formGroupExampleInput" class="form-label">Titre du livre</label>
                <input type="text" class="form-control" id="title" placeholder="Example input placeholder">
                </div>
                <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Another label</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
            </form>
        </html>



    <?php
    }

    
}



?>