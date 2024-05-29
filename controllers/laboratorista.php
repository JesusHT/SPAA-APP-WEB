<?php
    class Laboratorista extends Controller {

        function __construct(){
            parent::__construct();

            $this -> view -> render('laboratorista/index');
        }
    }

?>