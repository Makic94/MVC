<?php

class Login_Model extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function run(){
        $stmt= $this->db->prepare("SELECT id FROM users WHERE login = :login AND password = md5(:password)");
        $stmt->execute(array(
            ':login'=> $_POST['login'],
            ':password'=>$_POST['password']
        ));

        //$data=$stmt->fetchAll();
        $count = $stmt->rowCount();
        if($count>0) {
                //login
                Session::init();
                Session::set('loggedIn',true);
                header('Location: ../dashboard');
            }
            else {
                //show an error
                header('Location: ../login');
            }
    }


}

?>