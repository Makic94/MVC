<?php

class Errormsg extends Controller{

    function __construct(){
        parent::__construct();
        echo "File not found.<br>";

        $this->view->msg='This page does not exist.<br>';
        $this->view->render('error/index');
    }

}

?>