<?php

class Auth{

    public static function handleLogin()
    {
        @session_start();
        $logged = $_SESSION['loggedIn'];
        if($logged != true)
        {
        session_unset();
        session_destroy();
        header('Location: '.URL.'login');
        exit;
        }

    }

}

?>