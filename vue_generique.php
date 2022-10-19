<?php

class vueGenerique{
    public function __construct(){

        ob_start();
    }

    public function getAffichage(){
        return ob_get_clean();
        //ob_end_flush();
    }

}

?>