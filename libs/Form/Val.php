<?php

class Val
{
    public function __construct(){

    }

    public function minlength($data,$arg)
    {
        if($data!=null)
            {
                if (strlen($data) <= $arg) die("Your name needs to be longer than $arg characters!");
            }
        else die('no data');
    }

    public function maxlength($data,$arg)
    {
        if (strlen($data) > $arg) die("Your name can not be longer than $arg characters!");
    }

    public function digit($data)
    {
        if (ctype_digit($data)==false) die("Your string must be a digit!");
    }

    public function __call($name,$arguments)
    {
        throw new Exception("$name does not exist inside of: ". __CLASS__);
    }
}

?>