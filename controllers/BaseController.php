<?php 

    class BaseController{

        public static function salir(){
            session_unset();
            session_destroy();
            ?>
            <script>window.location.replace("index.php");</script>
            <?php
        }
        
    }
?>