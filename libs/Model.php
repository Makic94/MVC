<?php

class Model{

    function __construct(){
        $this->db = New Database(DB_TYPE,DB_HOST,DB_NAME,DB_USER,DB_PASS);

        // parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIONS);

    }

    /**
     * select
     * @param string $sql an SQL string
     * @param array $array Parameters to bind
     * @param constant $fetchMode A PDO Fetch Mode
     * @return mixed
     */
    public function select($sql,$array=array(),$fetchMode=PDO::FETCH_ASSOC)
    {
        $stmt = $this->db->prepare($sql);
        foreach($array as $key=>$value)
        {
            $stmt->bindValue("$key",$value);
        }
        $stmt->execute();
        return $stmt->fetchAll($fetchMode);
    }

    /**
     * insert
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function insert($table,$data)
    {
        ksort($data);

        $fieldNames=implode('`,`',array_keys($data));
        $fieldValues= ':'.implode(', :',array_keys($data));

        $stmt = $this->db->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach($data as $key=>$value)
        {
            $stmt->bindValue(":$key",$value);
        }
        $stmt->execute();
    }

    /**
     * update
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where the WHERE query part
     */
    public function update($table,$data,$where)
    {
        ksort($data);

        $fieldDetails = NULL;
        foreach($data as $key=>$value)
            {
                $fieldDetails .="`$key`=:$key,";
            }
        $fieldDetails=rtrim($fieldDetails,',');

        $stmt = $this->db->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        foreach($data as $key=>$value)
        {
            $stmt->bindValue(":$key",$value);
        }
        $stmt->execute();
    }

    /**
     * delete
     * @param string $table
     * @param string $where
     * @param integer $limit
     * @return integer Afected Rows
     */
    public function deleteF($table,$where,$limit=1)
    {
        return $this->db->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
}

?>