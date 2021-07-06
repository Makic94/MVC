<?php

class User_Model extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function userList()
    {
        $stmt = $this->db->prepare('SELECT id,login,role FROM users WHERE role="default" OR role="admin" ORDER BY role ASC');
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
        $stmt = $this->db->prepare('INSERT INTO users (login, password, role) VALUES (:login, :password, :role)');
        $stmt->execute(array(
            ':login'=>$data['login'],
            ':password'=>$data['password'],
            ':role'=>$data['role']
        ));
    }

    public function editSave($data)
    {
        $stmt = $this->db->prepare('UPDATE users SET login=:login, password=:password, role=:role WHERE id=:id');
        $stmt->execute(array(
            ':id'=>$data['id'],
            ':login'=>$data['login'],
            ':password'=>md5($data['password']),
            ':role'=>$data['role']
        ));
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