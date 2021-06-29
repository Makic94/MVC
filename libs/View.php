<?php

class View{

    function __construct(){
        echo "this is the view.";
    }

    public function render($name)
    {
        require_once('views/'.$name.'.php');
    }

}

?>