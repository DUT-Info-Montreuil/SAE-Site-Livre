<?php

class vueGenerique{
    public function __construct(){
        ob_start();
    }


    public function getAffichage()
    {
        return ob_get_clean();
    }

    public function Success($message)
    {
       
?>

        <html>
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <svg class="bd-placeholder-img rounded me-2" width="20" height="20" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#007aff"></rect>
                </svg>
                <strong class="me-auto">SYSTEME</strong>
                <small>time</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= $message; ?>
            </div>
        </div>




        </html>
    <?php
    }


    public function Error($message)
    {
    ?>

        <html>
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <svg class="bd-placeholder-img rounded me-2" width="20" height="20" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#ff0000"></rect>
                </svg>
                <strong class="me-auto">SYSTEME</strong>
                <small>time</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= $message; ?>
            </div>
        </div>




        </html>
<?php
    }

}

?>