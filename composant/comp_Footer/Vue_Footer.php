<?php
require_once("vue_generique.php");

class Vue_Footer extends vueGenerique
{
  public function __construct()
  {
    parent::__construct();
?>

    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top border-dark">
        <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>

        <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none mx-5">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
          </svg>
        </a>

        <ul class="nav col-md-4 justify-content-end">
          <li><a href="index.php?action=print_create_book&module=CLivre" class="nav-link px-2 text-muted">Rédaction</a></li>
          <li><a href="index.php?module=bibliotheque" class="nav-link px-2 text-muted">Bibliothèque</a></li>
        </ul>
      </footer>
    </div>


<?php
  }
}


?>