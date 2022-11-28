<?php
require_once("vue_generique.php");
class Vue_Accueil extends vueGenerique
{
  public function __construct()
  {
    parent::__construct();
  }
  public function affichageCarouselElement($book)
  {
    foreach ($book as $key) {
      $id = $key['id'];
      $titre = $key['titre'];
      $resume = $key['resumeLivre'];

      echo "  <a href=\"index.php?module=livre&idLivre=$id\">
      <div class=\"col\">
        <div class=\"card text-bg-dark\">
          <img src=\"ressource/bookCover/$id\" class=\"card-img carousel-Accueil\" alt=\"...\">
          <div class=\"card-img-overlay\">
            <div class=\"w-100 position-absolute start-0 bottom-0 bg-dark bg-opacity-75\">
              <h5 class=\"card-title text-white  fw-bold \">$titre</h5>
              <p class=\"card-text text-white fw-bold\">$resume</p>

            </div>

          </div>
        </div>
      </div>
      </a>";
    }
  }
  public function Carrousel($likeBook, $viewBook, $randomBook)
  {

?>
    <html>


    <body>
      <div class="container py-4">
        <div class="row gx-5">
          <div class="col text-center ">
            <a href="index.php?action=print_create_book&module=CLivre" class="btn btn-warning btn-lg justify-content-center px-4 mx-2 fs-3" role="button" id="EcrireLivre">Ecrire livre</a>
            <a href="index.php?module=bibliotheque" class="btn btn-warning btn-lg justify-content-center px-4 mx-2 fs-3" role="button" id="VoireLIVRE">Voir plus de livre</a>

          </div>
        </div>
      </div>
      <div id="carouselAccueil">
        <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">

          <div class="carousel-inner">



            <div class="carousel-item active" data-bs-interval="10000">
              <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php $this->affichageCarouselElement($likeBook) ?>
              </div>
            </div>

            <div class="carousel-item" data-bs-interval="10000">
              <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php $this->affichageCarouselElement($viewBook) ?>
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="10000">
              <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php $this->affichageCarouselElement($randomBook) ?>
              </div>
            </div>
            <div>
              <button class="ControlebuttonCarousel carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="ControlebuttonCarousel carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon " aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>


    </body>


    </html>
<?php
  }
}
?>