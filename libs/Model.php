<?php

class Model{

    function __construct(){
        $this->db = New Database(DB_TYPE,DB_HOST,DB_NAME,DB_USER,DB_PASS);

        // parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIONS);

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
}

?>