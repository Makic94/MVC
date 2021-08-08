<?php

class User_Model extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function userList()
    {
        return $this->select('SELECT userid,login,role FROM users WHERE role="default" OR role="admin" ORDER BY role DESC');
    }

    public function userSingleList($userid)
    {
        return $this->select('SELECT userid,login,role FROM users WHERE userid=:userid',array('userid'=>$userid));
    }

    public function create($data)
    {
        $this->insert('users',array(
            'login'=>$data['login'],
            'password'=>Hash::create('md5',$data['password'],HASH_PASSWORD_KEY),
            'role'=>$data['role']
        ));
    }

    public function editSave($data)
    {
        $postData = array(
            'login'=>$data['login'],
            'password'=>Hash::create('md5',$data['password'],HASH_PASSWORD_KEY),
            'role'=>$data['role']
        );

        $this->update('users',$postData,'userid='.$data['userid']);
    }

    public function delete($userid)
    {
        $this->deleteF('users',"userid='$userid'");
    }
}

?>