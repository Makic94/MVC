<?php

class Errormsg extends Controller{

    function __construct(){
        parent::__construct();
        echo "File not found.";

        $this->view->msg='This page does not exist';
        $this->view->render('error/index');
    }

}

?>