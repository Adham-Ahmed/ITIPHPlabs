<?php

class Visitor{
    private $id;
    private $name;
    private $email;

    public function __construct($id,$name,$email)
    {
        $this->$id=$id;
        $this->$name=$name;
        $this->$email=$email;

    }

    public function setName($name)
    {
        $this->$name=$name;
    }

}
?>