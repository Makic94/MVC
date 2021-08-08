<?php

class Note_Model extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function noteList()
    {
        return $this->select('SELECT * FROM note WHERE userid = :userid ORDER BY noteid DESC', array('userid'=>$_SESSION['userid']));
    }

    public function noteSingleList($noteid)
    {
        return $this->select('SELECT * FROM note WHERE userid = :userid AND noteid=:noteid',
        array('userid'=>$_SESSION['userid'], 'noteid'=>$noteid));
    }

    public function create($data)
    {
        $this->insert('note',array(
            'title'=>$data['title'],
            'userid'=>$_SESSION['userid'],
            'content'=>$data['content']
        ));
    }

    public function editSave($data)
    {
        $postData = array(
            'title'=>$data['title'],
            'content'=>$data['content']
        );

        $this->update('note',$postData,"noteid={$data['noteid']} AND userid={$_SESSION['userid']}");
    }

    public function delete($data)
    {
        $this->deleteF('note',"noteid={$data['noteid']} AND userid={$_SESSION['userid']}");
    }
}

?>