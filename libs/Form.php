<?php
/**
     * 
     * - Fill out a form
     * - POST to PHP
     * - Sanitize
     * - Validate
     * - Return Data
     * - Write to database
     */
class Form{
    
    private $_postData = array();

    public function __construct(){

    }
    /**
     * post - This is to run $_POST
     */
    public function post($field)
    {
        $this->$_postData[$field]=$_POST[$field];

        return $this;
    }

    /**
     * fetch - Return the posted data
     * 
     * @param mixed $fieldName
     * 
     * @return mixed String or array
     */
    public function fetch($fieldName = false)
    {
        if($fieldName) 
        {
            if(isset($this->$_postData[$fieldName]))
            return $this->$_postData[$fieldName];

            else
            return false;
        } 
        else 
        {
            return $this->$_postData;
        }
    }

    /**
     * val - This is to validate
     */
    public function val()
    {

        return $this;
    }

}

?>