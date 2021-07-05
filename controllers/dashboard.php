<?php

class Dashboard extends Controller{

    function __construct()  {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if($logged != true){
            Session::destroy();
            header('Location: ../login');
            exit;
        }

        $this->view->js=array('dashboard/js/default.js');
    }

    function index(){
        $this->view->render('dashboard/index');
    }

    function logout()
    {
        Session::destroy();
        header('Location: ../login');
        exit;
    }

    function xhrInsert()
    {
        $this->model->xhrInsert();
    }

    function xhrGetListings()
    {
        $this->model->xhrGetListings();
    }

    function xhrDeleteListing()
    {
        $this->model->xhrDeleteListing();
    }
}

?>