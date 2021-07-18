<?php

class Dashboard_Model extends Model{

    function __construct()
    {
        parent::__construct();
    }

    function xhrInsert()
    {
        $text=$_POST['text'];

        $this->insert('data',array('text'=>$text));
        $data=array('text'=>$text, 'id'=>$this->db->lastInsertId());
        echo json_encode($data);
    }

    function xhrGetListings()
    {
        $result = $this->select('SELECT * FROM data ORDER BY id ASC');
        echo json_encode($result);
    }

    function xhrDeleteListing()
    {
        $id=(int)$_POST['id'];
        $this->deleteF('data',"id='$id'");
    }

}

?>