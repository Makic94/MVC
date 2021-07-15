<?php

class User extends Controller{

    public function __construct()  {
        parent::__construct();
        Session::init();
        $role = Session::get('role');
        $logged = Session::get('loggedIn');
        if($logged != true or $role!='owner'){
            Session::destroy();
            header('Location: '.URL.'login');
            exit;
        }
    }

    public function index()
    {
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index');
    }

    public function create()
    {
        $data=array();
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];

        //todo error checking

        $this->model->create($data);
        header("Location: ".URL."user");
    }

    public function edit($id)
    {
        //fetch the individual user
        $this->view->user = $this->model->userSingleList($id);
        $this->view->render('user/edit');
    }

    public function editSave($id)
    {
        $data=array();
        $data['id'] = $id;
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];

        //todo error checking

        $this->model->editSave($data);
        header("Location: ".URL."user");
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header("Location: ".URL."user");
    }

}

?>