<?php

class Login_Model extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function run()
    {
        $stmt= $this->db->prepare("SELECT id,role FROM users WHERE login = :login AND password = :password");
        $stmt->execute(array(
            ':login'=> $_POST['login'],
            ':password'=>Hash::create('md5',$_POST['password'],HASH_PASSWORD_KEY)
        ));
        $data = $stmt->fetch();
        
        //$data=$stmt->fetchAll();
        $count = $stmt->rowCount();
        if($count>0) {
                //login
                Session::init();
                Session::set('role',$data['role']);
                Session::set('loggedIn',true);
                header('Location: ../dashboard');
            }
            else {
                //show an error
                header('Location: '.URL.'login');
            }
    }


}

?>