<?php

class User_Model extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function userList()
    {
        $stmt = $this->db->prepare('SELECT id,login,role FROM users WHERE role="default" OR role="admin" ORDER BY role DESC');
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function userSingleList($id)
    {
        $stmt = $this->db->prepare('SELECT id,login,role FROM users WHERE id=:id');
        $stmt->execute(array(
            ':id'=>$id
        ));
        return $stmt->fetch();
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

        $this->update('users',$postData,'id='.$data['id']);
    }

    public function delete($id)
    {
        $stmt=$this->db->prepare('DELETE FROM users WHERE id=:id');
        $stmt->execute(array(
            ':id'=>$id
        ));
    }
}

?>