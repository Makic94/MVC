<?php

class Dashboard_Model extends Model{

    function __construct()
    {
        parent::__construct();
    }

    function xhrInsert()
    {
        $text=$_POST['text'];

        $stmt = $this->db->prepare('INSERT INTO data (text) VALUES (:text)');
        $stmt->execute(array(':text' => $text));

        $data=array('text'=>$text, 'id'=>$this->db->lastInsertId());
        echo json_encode($data);
    }

    function xhrGetListings()
    {
        $stmt=$this->db->prepare('SELECT * FROM data ORDER BY id ASC');
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $data=$stmt->fetchAll();
        echo json_encode($data);
    }

    function xhrDeleteListing()
    {
        $id=$_POST['id'];
        $stmt=$this->db->prepare('DELETE FROM DATA where id= "'.$id.'"');
        $stmt->execute();
    }

}

?>